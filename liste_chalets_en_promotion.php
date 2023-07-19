<?php 
  require_once 'controleurs/controleur_chalets.php';
  require_once 'controleurs/controleur_regions.php';

  $title = 'Chalets à louer - chalets en promotion';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

  <main>
  
    <h1>Promotions (chalets actifs en promotion)</h1>
	
    <?php 
      $controleurChalets=new ControleurChalet;
      $controleurChalets->afficherListeActifPromoAlpha();
    ?>

  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>

