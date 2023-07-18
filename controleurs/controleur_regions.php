<?php

require_once __DIR__ . '/../modeles/modele_regions.php';

class ControleurRegions {
    
    /* Fonction permettant de récupérer l'ensemble des régions et de les afficher dans le menu */
    function afficherListeMenuRegions() {
        $regions = modele_region::ObtenirTous();
        require  __DIR__ . '/../vues/regions/liste-menu.php';
    }

    /* Fonction permettant de récupérer l'ensemble des régions par id et de les afficher dans le menu */
    function afficherRegionParId($id) {
        $regions = modele_region::obtenirRegionParId($id);
        return $regions;
    }
}

?>