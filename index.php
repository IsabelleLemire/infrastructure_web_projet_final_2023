<?php 
  require_once 'controleurs/controleur_chalets.php';
  require_once 'controleurs/controleur_regions.php';

  $title = 'Chalets à louer';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

<main>

  <h1>Projet final</h1>

  <div class="flex">
    <?php 
          $controleurChalets=new ControleurChalet;
          $controleurChalets->afficher6CardActifPromoRecent();
    ?>
  </div>

</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
