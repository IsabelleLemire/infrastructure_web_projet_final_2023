<?php

require_once __DIR__ . '../../include/config.php';

class modele_region {
    public $id; 
    public $nom; 

    /* Fonction permettant de construire un objet de type modele_region */
    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    /* Fonction permettant de se connecter à la base de données */
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        } 

        return $mysqli;
    }

    /* Fonction permettant de récupérer l'ensemble des régions */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM regions");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_region($enregistrement['id'], $enregistrement['nom']);
        }

        return $liste;
    }

    /* Fonction permettant de récupérer une region en fonction de son identifiant */
    public static function obtenirRegionParId($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM regions WHERE id=?")) {
            $requete->bind_param("i", $id);

            $requete->execute();

            $result = $requete->get_result();
            
            if($enregistrement = $result->fetch_assoc()) {
                $region = new modele_region(
                                $enregistrement['id'], 
                                $enregistrement['nom']                  
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

        return $region;
    }    
    

}

?>