<?php 
  require_once 'controleurs/controleur_chalets.php';
  require_once 'controleurs/controleur_regions.php';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

  <main>
  
    <h1 class="my-4">Tous les chalets actifs</h1>

    <?php 
      $controleurChalets=new ControleurChalet;
      $controleurChalets->afficherListeActifAlpha();
    ?>
	
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>

