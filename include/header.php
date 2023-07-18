<!DOCTYPE html>
<html lang="fr-CA">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Titre de la page </title> <!-- (défi! rendre ce titre dynamique selon la page sélectionnée) -->
  
  <link rel="stylesheet" href="css/styles.css">
</head>

<body class="light-mode">

  <!-- Navigation -->
  <header>
    <nav>
      <img src="https://picsum.photos/id/13/80" alt="logo">
      <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="liste_chalets.php">Chalets à louer</a></li>
          <li>
            <a>Chalets par région &nbsp;<i class="arrow down"></i></a>
            <ul>
              <?php
                $controleurRegions = new ControleurRegions;
                $controleurRegions->afficherListeMenuRegions();
              ?>
            </ul>
          </li>
          <li><a href="liste_chalets_en_promotion.php">Chalets en promotion</a></li>
          <li><a href="module_personnel.php">Module personnel</a></li>
          <li>
            <a href="administration_chalets.php">Administration &nbsp;<i class="arrow down"></i></a>
            <ul>
              <li><a href="administration_chalets.php">Chalets</a></li>
              <li><a href="administration_module_personnel.php">Module personnel</a></li>
            </ul>
          </li>
      </ul>

      <!-- Formulaire de connexion -->
      <dialog id="dialog_login">         
          <form>
            <input type="text" placeholder="Utilisateur" >
            <input type="password" placeholder="Mot de passe" >
            <button>Connexion</button>
            <button id="close" class="annuler" aria-label="close" formnovalidate onclick="document.getElementById('dialog_login').close();">Annuler</button>
          </form>
      </dialog>        
      <button onclick="document.getElementById('dialog_login').showModal();">Connexion</button>
    </nav>
    <hr>
  </header>

  
