<?php 
  require_once 'controleurs/controleur_chalets.php';
  require_once 'controleurs/controleur_regions.php';

  $title = 'Chalets à louer - chalets en promotion';
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

  <main>
  
    <h1>Ajouter un utilisateur</h1>
	
    <?php 
      $ControlleurAuthentification=new ControlleurAuthentification;
      $ControlleurAuthentification->afficherFormulaireAjoutUtilisateur();
    ?>

  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
