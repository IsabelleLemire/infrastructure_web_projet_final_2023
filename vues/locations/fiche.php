<!-- Affichage en mode Fiche -->
<div class="flex flex-fiche fiche fiche-seul">
    <div class="section-contenue-fiche-admin">
        <h2><?= $location->nom_item ?></h2>
        <h3><?= $location->categorie ?></h3>
        <p><?= $location->prix_location_par_jour ?> $/jour</p>
        <p><?= $location->description_item ?></p>
    </div>
</div>

<button onclick="goBack()">Retour</button>
