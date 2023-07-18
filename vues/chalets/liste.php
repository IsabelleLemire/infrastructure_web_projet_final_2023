<!-- Affichage en mode Liste -->

<?php foreach ($chalets as $chalet) : ?>
  <div class="flex flex-fiche fiche liste">
    
    <div class="section-image-chalet">
      <img src="https://picsum.photos/id/<?= $chalet->id_picsum ?>/300" alt="Chalet #<?= $chalet->id ?>">
    </div>

    <div class="section-contenue-chalet">
      <h2><?= $chalet->nom ?></h2>
      <p>À partir de <span class="prix"><?= $chalet->prix_basse_saison ?> $</span></p>
      <p><a class="btn-cta" href="fiche_chalet.php?id=<?= $chalet->id ?>">Pour en savoir plus</a></p>
    </div>
  </div>
<?php endforeach; ?>