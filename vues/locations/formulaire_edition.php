<div class="container-form">
    <form method="POST">
        <div>
            <label for="nom_item">Nom de l'item*</label>
            <input type="text" id="nom_item" name="nom_item" required minlength="2" maxlength="30" value="<?= $location->nom_item ?>">
        </div>
        <div>
            <label for="categorie">Catégorie de l'item*</label>
            <input type="text" id="categorie" name="categorie" required minlength="2" maxlength="30" value="<?= $location->categorie ?>">
        </div>  
        <div>
            <label for="prix_location_par_jour">Prix de la location par jour*</label>
            <input type="number" id="prix_location_par_jour" name="prix_location_par_jour" required minlength="2" maxlength="10" value="<?= $location->prix_location_par_jour ?>">
        </div>          
        <div>
            <label for="description_item">Description de l'item*</label>
            <textarea id="description_item" name="description_item" required minlength="2" maxlength="800"><?= $location->description_item ?></textarea>
        </div>
        <button name="boutonEditer" type="submit">Modifier l'item</button><br>
    </form>

</div>
