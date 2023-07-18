<?php 
  require_once 'modeles/modele_chalets.php';

  class ControleurChalet {

    /* Fonction pour récupérer TOUS les chalets */
    function afficherListe() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/liste.php';
    }

    /* Fonction pour récupérer l'ensemble des chalets ACTIFS qui s'affiche en ordre alphabétique */
    function afficherListeActifAlpha() {
      $chalets = modele_chalet::ObtenirActifAlpha();
      require './vues/chalets/liste.php';
    }

    /* Fonction pour récupérer l'ensemble des chalets ACTIFS et en PROMOS qui s'affiche en ordre alphabétique */
    function afficherListeActifPromoAlpha() {
      $chalets = modele_chalet::ObtenirActifPromoAlpha();
      require './vues/chalets/liste.php';
    } 
    
    
    /* Fonction pour récupérer les 6 chalets ACTIFS et en PROMOS qui s'affiche en ordre du plud récent */
    function afficher6CardActifPromoRecent() {
      $chalets = modele_chalet::ObtenirActifPromoRecent();
      require './vues/chalets/card.php';
    }

    /* Fonction permettant de récupérer un chalet à partir de l'identifiant (id) et l'affiche sous forme de FICHE */
    function afficherFiche() {
      if(isset($_GET["id"])) {
          $chalet = modele_chalet::ObtenirUn($_GET["id"]);
          if($chalet) {
              require './vues/chalets/fiche.php';
          } else {
              $erreur = "Aucun chalet trouvé";
              require './vues/erreur.php';
          }
      } else {
          $erreur = "L'identifiant (id) du chalet à afficher est manquant";
          require './vues/erreur.php';
      }
    }

    /* afficher chalet par région */
    function afficherChaletsParRegion($regionId) {
      $chalets = modele_chalet::ObtenirChaletsRegion($regionId);
      require './vues/chalets/liste.php';
    }    

  }
?>