<?php 
    require_once "./include/config.php";

    class modele_chalet {
        public $id; 
        public $nom; 
        public $description;
        public $personnes_max;
        public $prix_haute_saison;
        public $prix_basse_saison;
        public $actif;
        public $promo;
        public $date_inscription;
        public $fk_region;
        public $id_picsum;

        /* Fonction pour construire mon modele_chalet */
        public function __construct($id, $nom, $description, $personnes_max, $prix_haute_saison, $prix_basse_saison, $actif, $promo, $date_inscription, $fk_region, $id_picsum) {
            $this->id = $id;
            $this->nom = $nom;
            $this->description = $description;
            $this->personnes_max = $personnes_max;
            $this->prix_haute_saison = $prix_haute_saison;
            $this->prix_basse_saison = $prix_basse_saison;
            $this->actif = $actif;
            $this->promo = $promo;
            $this->date_inscription = $date_inscription;
            $this->fk_region = $fk_region;
            $this->id_picsum = $id_picsum;
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
        
        /* Fonction pour récupérer l'ensemble des chalets */
        public static function ObtenirTous() {
            $liste = [];
            $mysqli = self::connecter();

            $resultatRequete = $mysqli->query(
                'SELECT * 
                FROM chalets 
                WHERE 1;'
            );

            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_chalet(
                                $enregistrement['id'], 
                                $enregistrement['nom'], 
                                $enregistrement['description'], 
                                $enregistrement['personnes_max'], 
                                $enregistrement['prix_haute_saison'], 
                                $enregistrement['prix_basse_saison'], 
                                $enregistrement['actif'], 
                                $enregistrement['promo'], 
                                $enregistrement['date_inscription'], 
                                $enregistrement['fk_region'], 
                                $enregistrement['id_picsum']
                );
            }

            return $liste;
        }

        /* Fonction pour récupérer l'ensemble des chalets actifs qui s'affiche en ordre alphabétique */
        public static function ObtenirActifAlpha() {
            $liste = [];
            $mysqli = self::connecter();

            $resultatRequete = $mysqli->query(
                'SELECT id, nom, description, personnes_max, prix_haute_saison, prix_basse_saison, actif, promo, date_inscription, fk_region, id_picsum 
                 FROM chalets 
                 WHERE actif = 1 
                 ORDER BY nom ASC;'

            );

            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_chalet(
                                $enregistrement['id'], 
                                $enregistrement['nom'], 
                                $enregistrement['description'], 
                                $enregistrement['personnes_max'], 
                                $enregistrement['prix_haute_saison'], 
                                $enregistrement['prix_basse_saison'], 
                                $enregistrement['actif'], 
                                $enregistrement['promo'], 
                                $enregistrement['date_inscription'], 
                                $enregistrement['fk_region'], 
                                $enregistrement['id_picsum']
                );
            }

            return $liste;
        } 

        
        /* Fonction pour récupérer l'ensemble des chalets ACTIFS et PROMO qui s'affiche en ordre alphabétique */
        public static function ObtenirActifPromoAlpha() {
            $liste = [];
            $mysqli = self::connecter();

            $resultatRequete = $mysqli->query(
                'SELECT id, nom, description, personnes_max, prix_haute_saison, prix_basse_saison, actif, promo, date_inscription, fk_region, id_picsum 
                 FROM chalets 
                 WHERE actif = 1 AND promo = 1 
                 ORDER BY nom ASC;'

            );

            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_chalet(
                                $enregistrement['id'], 
                                $enregistrement['nom'], 
                                $enregistrement['description'], 
                                $enregistrement['personnes_max'], 
                                $enregistrement['prix_haute_saison'], 
                                $enregistrement['prix_basse_saison'], 
                                $enregistrement['actif'], 
                                $enregistrement['promo'], 
                                $enregistrement['date_inscription'], 
                                $enregistrement['fk_region'], 
                                $enregistrement['id_picsum']
                );
            }

            return $liste;
        } 

        /* Fonction pour récupérer les 6 derniers chalets ACTIFS et PROMO qui s'affiche en ordre du plus récent */
        public static function ObtenirActifPromoRecent() {
            $liste = [];
            $mysqli = self::connecter();

            $resultatRequete = $mysqli->query(
                'SELECT id, nom, description, personnes_max, prix_haute_saison, prix_basse_saison, actif, promo, date_inscription, fk_region, id_picsum 
                 FROM chalets 
                 WHERE actif = 1 AND promo = 1 
                 ORDER BY date_inscription DESC
                 LIMIT 6;'

            );

            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_chalet(
                                $enregistrement['id'], 
                                $enregistrement['nom'], 
                                $enregistrement['description'], 
                                $enregistrement['personnes_max'], 
                                $enregistrement['prix_haute_saison'], 
                                $enregistrement['prix_basse_saison'], 
                                $enregistrement['actif'], 
                                $enregistrement['promo'], 
                                $enregistrement['date_inscription'], 
                                $enregistrement['fk_region'], 
                                $enregistrement['id_picsum']
                );
            }

            return $liste;
        }         


        /* Fonction permettant de récupérer un chalet en fonction de son identifiant */
        public static function ObtenirUn($id) {
            $mysqli = self::connecter();

            if ($requete = $mysqli->prepare("SELECT * FROM chalets WHERE id=?")) {
                $requete->bind_param("i", $id);

                $requete->execute();

                $result = $requete->get_result();
                
                if($enregistrement = $result->fetch_assoc()) {
                    $chalet = new modele_chalet(
                                    $enregistrement['id'], 
                                    $enregistrement['nom'], 
                                    $enregistrement['description'], 
                                    $enregistrement['personnes_max'], 
                                    $enregistrement['prix_haute_saison'], 
                                    $enregistrement['prix_basse_saison'], 
                                    $enregistrement['actif'], 
                                    $enregistrement['promo'], 
                                    $enregistrement['date_inscription'], 
                                    $enregistrement['fk_region'], 
                                    $enregistrement['id_picsum']                    
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

            return $chalet;
        }

        /* fonction qui permet de sélectionner les chalets par régions */

        public static function ObtenirChaletsRegion($regionId) {
            $liste = [];
            $mysqli = self::connecter();
        
            $resultatRequete = $mysqli->query("SELECT id, nom, description, personnes_max, prix_haute_saison, prix_basse_saison, actif, promo, date_inscription, fk_region, id_picsum
            FROM chalets
            WHERE actif = 1 AND fk_region = $regionId
            ORDER BY nom ASC;");
        
            foreach ($resultatRequete as $enregistrement) {
              $liste[] = new modele_chalet(
                                    $enregistrement['id'], 
                                    $enregistrement['nom'], 
                                    $enregistrement['description'], 
                                    $enregistrement['personnes_max'], 
                                    $enregistrement['prix_haute_saison'], 
                                    $enregistrement['prix_basse_saison'], 
                                    $enregistrement['actif'], 
                                    $enregistrement['promo'], 
                                    $enregistrement['date_inscription'], 
                                    $enregistrement['fk_region'], 
                                    $enregistrement['id_picsum']);
            }
        
            return $liste;
        }        

    }



?>