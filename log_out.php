<?php 
    session_start();
    require_once 'controleurs/controleur_authentification.php';
?>

<?php 
      $controlleurAuthentification=new ControlleurAuthentification;
      $controlleurAuthentification->deconnecter();
?>