<?php 
    require_once 'controleurs/controleur_chalets.php';
    require_once 'controleurs/controleur_regions.php';
    require_once 'controleurs/controleur_locations.php';

    $title = 'Chalets à louer - Fiche des items en location';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

  <main>
  
    <h1 class="my-4">Fiche détaillée de l'item en location</h1>

    <?php 
      $controleurLocations=new ControleurLocations;
      $controleurLocations->afficherFiche();
    ?>
	
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>

