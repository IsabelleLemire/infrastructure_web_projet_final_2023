<?php 

    require_once './modeles/modele_locations.php';

    class ControleurLocations {

        function afficherTableau() {
            $locations = modele_location::ObtenirTous();
            require './vues/locations/tableau.php';
        }

        function afficherTableauAdmin() {
            $locations = modele_location::ObtenirTous();
            require './vues/locations/tableau_admin.php';
        }

        function afficherFiche() {
            if(isset($_GET["id"])) {
                $location = modele_location::ObtenirUn($_GET["id"]);
                if($location) {
                    require './vues/locations/fiche.php';
                } else {
                    $erreur = "Aucun item trouvé";
                    require './vues/erreur.php';
                }
            } else {
                $erreur = "L'identifiant (id) de l'item à afficher est manquant";
                require './vues/erreur.php';
            }
          }
        
        function afficherFormulaireEdition() {
            if(isset($_GET["id"])) {
                $location = modele_location::ObtenirUn($_GET["id"]);
                if($location) {
                    require './vues/locations/formulaire_edition.php';
                } else {
                    $erreur = "Aucun item trouvé";
                    require './vues/erreur.php';
                }
            } else {
                $erreur = "L'identifiant (id) de l'item à afficher est manquant";
                require './vues/erreur.php';
            }
        }

        function afficherFormulaireSuppression(){
            if(isset($_GET["id"])) {
                $location = modele_location::ObtenirUn($_GET["id"]);
                if($location) {
                    require './vues/locations/formulaire_suppression.php';
                }
            } else {
                $erreur = "L'identifiant (id) de l'item à afficher est manquant dans l'url";
                require './vues/erreur.php';
            }
        }        

        /* Fonction permettant de modifier un items de location */
        function editer() {
            if(isset($_GET['id'], $_POST['nom_item']) && isset($_POST['description_item']) && isset($_POST['prix_location_par_jour']) && isset($_POST['categorie'])) {
                $message = modele_location::editer($_GET['id'], $_POST['nom_item'], $_POST['description_item'], $_POST['prix_location_par_jour'], $_POST['categorie']);
                echo $message;
            } else {
                $erreur = "Impossible de modifier l'item. Des informations sont manquantes";
                require './vues/erreur.php';
            }
        }

        /* Fonction permettant de supprimer un items de location */
        function supprimer() {
            if(isset($_GET['id'])) {
                $message = modele_location::supprimer($_GET['id']);
                require './vues/locations/confirmation_suppression.php';
            } else {
                $erreur = "Impossible de supprimer l'item. Des informations sont manquantes";
                require './vues/erreur.php';
            }
        }       

        /* Fonction permettant d'ajouter un items de location */
        function ajouter() {
            if(isset($_POST['nom_item']) && isset($_POST['description_item']) && isset($_POST['prix_location_par_jour']) && isset($_POST['categorie'])) {

                $message = modele_location::ajouter($_POST['nom_item'], 
                                                    $_POST['description_item'], 
                                                    $_POST['prix_location_par_jour'], 
                                                    $_POST['categorie']);
                echo $message;
            } else {
                $erreur = "Impossible d'ajouter un item. Des informations sont manquantes";
                require './vues/erreur.php';
            }
        }

        
        
    }

?>