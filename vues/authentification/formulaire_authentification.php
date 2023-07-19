<?php
    require_once 'controleurs/controleur_authentification.php';

    if (isset($_POST['boutonConnexion'])) {        
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->connecter();
    } else if (isset($_POST['boutonDeconnexion'])) { 
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->deconnecter();
    }
?>

<?php if(!isset($_SESSION["utilisateur"])) { ?>

    <dialog id="dialog_login">  
        <h2>Formulaire d'authentification</h2>       
        <form  method="POST">
            <label for="utilisateur_login">Utilisateur</label>
            <input type="text" id="utilisateur_login" name="utilisateur_login" placeholder="Utilisateur" required >

            <label for="mot_de_passe_login">Mot de passe</label>
            <input type="password" id="mot_de_passe_login" placeholder="Mot de passe" required>

            <button name="boutonConnexion" type="submit">Connexion</button>
            <button id="close" class="annuler" aria-label="close" formnovalidate onclick="document.getElementById('dialog_login').close();">Annuler</button>
        </form>
    </dialog>

<?php } else { ?>
    
    <form method="POST">
        Vous êtes connecté en tant que <?= $_SESSION["utilisateur"] ?> 
        
        <button name="boutonDeconnexion" type="submit">Déconnexion</button>
    </form>
<?php } ?>