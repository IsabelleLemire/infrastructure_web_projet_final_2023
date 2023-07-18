<table class="table">

    <thead>
        <tr>
            <th>Item</th>
            <th>Catégorie</th>
            <th>Prix/jour</th>
            <th>Description</th>
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
            
                    
        </tbody>

    <?php } ?>



</table>