<?php 
    require_once 'controleurs/controleur_authentification.php';
?>

<?php 
      $controlleurAuthentification=new ControlleurAuthentification;
      $controlleurAuthentification->connecter();
?>