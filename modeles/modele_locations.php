<?php 
    require_once "./include/config.php";

    class modele_location {
        public $id; 
        public $nom_item; 
        public $description_item;
        public $prix_location_par_jour;
        public $categorie;

        /* Fonction pour construire mon modele_location */
        public function __construct($id, $nom_item, $description_item, $prix_location_par_jour, $categorie) {
            $this->id = $id;
            $this->nom_item = $nom_item;
            $this->description_item = $description_item;
            $this->prix_location_par_jour = $prix_location_par_jour;
            $this->categorie = $categorie;
        }
        

        /* Fonction pour se connecter à la base de données */
        static function connecter() {
            
            $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);
            mysqli_set_charset($mysqli, "utf8");

            // Vérifier la connexion
            if ($mysqli -> connect_errno) {
                echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   // Pour fins de débogage
                exit();
            } 

            return $mysqli;
        }   
        
        /* Fonction pour récupérer l'ensemble des locations */
        public static function ObtenirTous(){
            $liste = [];
            $mysqli = self::connecter();
        
            $resultatRequete = $mysqli->query(
                'SELECT items_location.*, categories_location.categorie
                 FROM items_location
                 INNER JOIN categories_location ON items_location.fk_categorie = categories_location.id
                 ORDER BY categories_location.categorie'
            );
        
            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_location(
                    $enregistrement['id'],
                    $enregistrement['nom_item'],
                    $enregistrement['description_item'],
                    $enregistrement['prix_location_par_jour'],
                    $enregistrement['categorie']
                );
            }
        
            return $liste;
        }

        /* pour récupérer toutes les catégories */
        public static function ObtenirToutesCategories() {
            $listeCategories = [];
            $mysqli = self::connecter();
        
            $resultatRequete = $mysqli->query("SELECT categorie FROM categories_location");
        
            if ($resultatRequete) {
                while ($enregistrement = $resultatRequete->fetch_assoc()) {
                    $listeCategories[] = $enregistrement['categorie'];
                }
            }
        
            return $listeCategories;
        }

        /* Fonction permettant de récupérer un item de location en fonction de son identifiant */
        public static function ObtenirUn($id) {
            $mysqli = self::connecter();

            if ($requete = $mysqli->prepare(
                "SELECT items_location.*, categories_location.categorie 
                 FROM items_location 
                 INNER JOIN categories_location 
                 ON items_location.fk_categorie = categories_location.id 
                 WHERE items_location.id=?")) {
                
                $requete->bind_param("i", $id);

                $requete->execute();

                $result = $requete->get_result();
                
                if($enregistrement = $result->fetch_assoc()) {
                    $location = new modele_location(
                                        $enregistrement['id'],
                                        $enregistrement['nom_item'],
                                        $enregistrement['description_item'],
                                        $enregistrement['prix_location_par_jour'],
                                        $enregistrement['categorie']              
                    );
                } else {
                    echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                    return null;
                }   
                
                $requete->close(); // Fermeture du traitement 
            } else {
                echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
                echo $mysqli->error;
                return null;
            }

            return $location;
        }

        /* Fonction permettant d'ajouter un item en location */
        public static function ajouter($nom_item, $description_item, $prix_location_par_jour, $categorie) {
            $message = '';
        
            $mysqli = self::connecter();
        
            // Obtenir l'ID de la catégorie à partir de son nom
            $requeteCategorie = $mysqli->prepare("SELECT id FROM categories_location WHERE categorie = ?");
            $requeteCategorie->bind_param("s", $categorie);
            $requeteCategorie->execute();
            $resultatCategorie = $requeteCategorie->get_result();
        
            if ($resultatCategorie->num_rows > 0) {
                $row = $resultatCategorie->fetch_assoc();
                $categorieId = $row['id'];
        
                // Insérer l'item en utilisant l'ID de la catégorie
                if ($requete = $mysqli->prepare(
                    "INSERT INTO items_location (nom_item, description_item, prix_location_par_jour, fk_categorie)
                    VALUES (?, ?, ?, ?)"
                )) {
                    $requete->bind_param("ssdi", $nom_item, $description_item, $prix_location_par_jour, $categorieId);
        
                    if ($requete->execute()) {
                        $message = "Nouvel item ajouté";
                    } else {
                        $message = "Une erreur est survenue lors de l'ajout : " . $requete->error;
                    }
        
                    $requete->close();
                } else {
                    echo "Une erreur a été détectée dans la requête utilisée : ";
                    echo $mysqli->error;
                    echo "<br>";
                    exit();
                }
            } else {
                $message = "La catégorie spécifiée n'existe pas.";
            }
        
            $requeteCategorie->close();
            return $message;
        }

        /* Fonction permettant d'éditer un item de location */
        public static function editer($id, $nom_item, $description_item, $prix_location_par_jour, $categorie) {
            $message = '';

            $mysqli = self::connecter();
        
            if ($requete = $mysqli->prepare(
                                    "UPDATE items_location 
                                    INNER JOIN categories_location 
                                    ON items_location.fk_categorie = categories_location.id 
                                    SET items_location.nom_item=?, items_location.description_item=?, items_location.prix_location_par_jour=?, categories_location.categorie=?
                                    WHERE items_location.id=?")) {      
                $requete->bind_param("ssdsi", $nom_item, $description_item, $prix_location_par_jour, $categorie, $id);

            if($requete->execute()) { // Exécution de la requête
                $message = "Item modifié";  // Message ajouté dans la page en cas d'ajout réussi
            } else {
                $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  // Message ajouté dans la page en cas d’échec
            }

            $requete->close(); // Fermeture du traitement

            } else  {
                echo "Une erreur a été détectée dans la requête utilisée : ";
                echo $mysqli->error;
                echo "<br>";
                exit();
            }

            return $message;
        }


        /* Fonction permettant de supprimer un item de location */
        public static function supprimer($id) {
            $message = '';

            $mysqli = self::connecter();
            
            // Création d'une requête préparée
            if ($requete = $mysqli->prepare("DELETE FROM items_location WHERE id=?")) {      

            $requete->bind_param("i", $id);

            if($requete->execute()) { // Exécution de la requête
                $message = "Item de location supprimé";  // Message ajouté dans la page en cas d'ajout réussi
            } else {
                $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
            }

            $requete->close(); // Fermeture du traitement

            } else  {
                echo "Une erreur a été détectée dans la requête utilisée : ";
                echo $mysqli->error;
                echo "<br>";
                exit();
            }

            return $message;
        }

    }



?>