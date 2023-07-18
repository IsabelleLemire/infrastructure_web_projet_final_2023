<table class="table">

    <thead>
        <tr>
            <th>Item</th>
            <th>Catégorie</th>
            <th>Prix/jour</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>

    <?php 
        foreach ($locations as $location) {
    ?>
        <tbody>
            <td><?=$location->nom_item ?></td>
            <td><?=$location->categorie ?></td>  
            <td><?=$location->prix_location_par_jour ?> $/jour</td>  
            <td><?=$location->description_item ?></td>
            <td>
                <a href="fiche_item_location.php?id=<?= $location->id ?>" class="btn-cta action">Afficher</a>
                <a href="edition_item_location.php?id=<?= $location->id ?>" class="btn-cta action">Modifier</a> 
                <a href="suppression_item_location.php?id=<?= $location->id ?>" class="btn-cta action">Supprimer</a>
            </td>
                    
        </tbody>

    <?php } ?>

</table>