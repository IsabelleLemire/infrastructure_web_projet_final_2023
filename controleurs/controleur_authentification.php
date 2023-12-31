<?php

require_once './modeles/modele_authentification.php';

class ControlleurAuthentification {

    
    /* Fonction permettant d'ajouter un utilisateur */
    function ajouter() {
        if(!isset($_SESSION['utilisateur'])) { die();} //ça arrête toute exécution

        if(isset($_POST['utilisateur_ajout']) && isset($_POST['mot_de_passe_ajout']) && isset($_POST['courriel_ajout'])) {
            $message = modele_authentification::ajouter($_POST['utilisateur_ajout'], $_POST['mot_de_passe_ajout'], $_POST['courriel_ajout']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un utilisateur. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    function afficherFormulaireAjoutUtilisateur() {
        //$utilisateur = modele_authentification::ObtenirFormulaireAjoutUtilisateur();
        if(!isset($_SESSION['utilisateur'])) {
            $erreur = "Tu n'es pas connecté";
            require './vues/erreur.php';
        } else {
            require './vues/authentification/formulaire_ajout.php';
        }
    }

    /* Fonction permettant à un utilisateur de se connecter */
    function connecter() {
        if(isset($_POST['code_utilisateur']) && isset($_POST['mot_de_passe'])) {
            $utilisateur = modele_authentification::ObtenirUn($_POST['code_utilisateur']);
            if($utilisateur) {            
                // Vérifier si le mot de passe soumis correspond au mot de passe stocké dans la base de données                
                if(password_verify($_POST['mot_de_passe'], $utilisateur->mot_de_passe)) {
                    // Stocker l'utilisateur dans la session
                    $_SESSION['utilisateur'] = $_POST['code_utilisateur']; 
                    header('Location: .'); // recharge la page courante
                } else {
                    $erreur = "<b class='erreur'>Le mot de passe est incorrect</b>";
                    require './vues/erreur.php';
                }
            } else {
                $erreur = "L'utilisateur n'existe pas";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "Impossible de se connecter. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    /* Fonction permettant à un utilisateur de se connecter */
    function deconnecter() {
        if(isset($_SESSION["utilisateur"])) {
            unset($_SESSION["utilisateur"]);
            header('Location: .');  // recharge la page courante
        }
    }
}