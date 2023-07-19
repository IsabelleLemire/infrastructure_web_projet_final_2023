<?php
require_once 'controleurs/controleur_chalets.php';
require_once 'controleurs/controleur_regions.php';

$title = 'Chalets à louer - chalet par région';

?>

<?php
include_once(__DIR__ . '/include/header.php');
?>

<main>

    <?php
      $controleurRegions = new ControleurRegions;
      if (isset($_GET['id'])) {
        $regionId = $_GET['id'];
        $region = $controleurRegions->afficherRegionParId($regionId);
        if ($region) {
            include_once(__DIR__ . '/vues/regions/affichage-titre.php');
        } else {
            echo "Région introuvable";
        }
      } else {
        echo "Aucun identifiant de région spécifié.";
      }

      $controleurChalets = new ControleurChalet;
      if (isset($_GET['id'])) {
        $regionId = $_GET['id'];
        $controleurChalets->afficherChaletsParRegion($regionId);
      } else {
        echo "Aucun identifiant de région spécifié.";
      }
    ?>

</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
