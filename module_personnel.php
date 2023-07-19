<?php 
  require_once 'controleurs/controleur_chalets.php';
  require_once 'controleurs/controleur_regions.php';
  require_once 'controleurs/controleur_locations.php';
  $title = 'Chalets à louer - module personnel';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

  <main>
  
	<h1>Module personnel</h1>	
  <h3>Tableau des items en location</h3>
  <p>Le tableau affiche la liste des items que l'on peut louer dans les chalets avec la catégorie de chacun.</p>
    
  <?php
      $controleurLocations=new ControleurLocations;
      $controleurLocations->afficherTableau();
  ?>
	
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
