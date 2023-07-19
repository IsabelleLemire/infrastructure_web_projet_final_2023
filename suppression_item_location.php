<?php
  require_once 'controleurs/controleur_chalets.php';
  require_once 'controleurs/controleur_regions.php';
  require_once 'controleurs/controleur_locations.php';

  $title = 'Chalets à louer - Supprimer un chalet';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

<main>
    <h1 class="my-4">Supprimer un item</h1>

    <?php 
      $controleurLocations = new ControleurLocations();

      if (isset($_POST['boutonSupprimer'])) {
          $controleurLocations->supprimer();
      } else {
          $controleurLocations->afficherFormulaireSuppression();
      }
    ?>

    <div class="container-form">
        <a href="administration_module_personnel.php">Retour à la liste</a>
    </div>
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
