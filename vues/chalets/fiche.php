<!-- Affichage en mode Fiche -->

<div class="flex flex-fiche fiche fiche-seul">
    
    <div class="section-image-chalet">
      <img src="https://picsum.photos/id/<?= $chalet->id_picsum ?>/500" alt="Chalet #<?= $chalet->id ?>">
    </div>

    <div class="section-contenue-chalet">
      <h2><?= $chalet->nom ?></h2>
      <p><?= $chalet->description ?></p>
      <p>Prix en basse saison : <span class="prix"><?= $chalet->prix_basse_saison ?> $</span></p>
      <p>Prix en haute saison : <span class="prix"><?= $chalet->prix_haute_saison ?> $</span></p>
      <p>Nombre de personne maximum : <span class="prix"><?= $chalet->personnes_max ?></span></p>
    </div>
  </div>

  <button onclick="goBack()">Retour</button>