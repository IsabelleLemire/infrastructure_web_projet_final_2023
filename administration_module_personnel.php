<?php 
  require_once 'controleurs/controleur_chalets.php';
  require_once 'controleurs/controleur_regions.php';
  require_once 'controleurs/controleur_locations.php';

  $title = 'Chalets à louer - Administrateur module personnel';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

  <main>
  
	<h1>Administration - Module personnel</h1>
  <h3>Tableau des items en location</h3>

  <a href="ajout_item_location.php" class="btn-cta btn-admin" aria-label="Ajouter un item en location">Ajouter un item en location</a>
    
  <?php
      $controleurLocations=new ControleurLocations;
      $controleurLocations->afficherTableauAdmin();
  ?>
	
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>