<?php
    require_once 'controleurs/controleur_chalets.php';
    require_once 'controleurs/controleur_regions.php';
    require_once 'controleurs/controleur_locations.php';
?>

<?php
    $location = new modele_location(null, '', '', '', ''); // met les cases vide.
    $listeCategories = modele_location::ObtenirToutesCategories(); // récupère la liste des catégories
?>

<?php
    if (isset($_POST['boutonAjouter'])) {      
        $controleurLocations=new ControleurLocations;
        $controleurLocations->ajouter();
    } 
?>

<?php include_once(__DIR__ . '/include/header.php'); ?>

  <main>
  
    <h1 class="my-4">Ajout d'un l'item</h1>

    <div class="container-form">
        <form method="POST">
            <div>
                <label for="nom_item">Nom de l'item*</label>
                <input type="text" id="nom_item" name="nom_item" required minlength="2" maxlength="30" value="<?= $location->nom_item ?>">
            </div>
            <div>
                <label for="categorie">Catégorie de l'item*</label>
                <select id="categorie" name="categorie" required>
                    <?php foreach ($listeCategories as $categorie) { ?>
                        <option value="<?php echo $categorie; ?>"><?php echo $categorie; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="prix_location_par_jour">Prix de la location par jour*</label>
                <input type="number" id="prix_location_par_jour" name="prix_location_par_jour" required minlength="2" maxlength="10" value="<?= $location->prix_location_par_jour ?>">
            </div>          
            <div>
                <label for="description_item">Description de l'item*</label>
                <textarea id="description_item" name="description_item" required minlength="2" maxlength="800"><?= $location->description_item ?></textarea>
            </div>
            <button name="boutonAjouter" type="submit">Ajouter l'item</button><br>
        </form>
    </div>
    <div class="container-form">
        <a href="administration_module_personnel.php">Retour à la liste</a>
    </div>
	
  </main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>