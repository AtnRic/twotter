<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
    <meta name="description" content="Twotter">
    <meta name="keywords" content="twotter">
    <meta name="author" content="Antoine RICHARD, Adrien VERHAEGHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twotter - Accueil</title>
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="icon" type="image/png" href="images/bat.png">
</head>
<body>
    <div class="left">
    </div>

    <div class="right">
        <div class="pad">
            <h1>Ça se passe<br>maintenant.</h1>
            <h2>Rejoignez Twotter dès aujourd'hui.</h2>
            <a class="button" href="#inscription">S'inscrire</a>
            <h3>Vous avez déjà un compte ?</h3>
            <a class="button" href="#connexion">Se connecter</a>
        </div>
    </div>

    <!--Pop-up d'inscription-->
    <div id="inscription" class="overlay">
        <div class="popup">
            <img class ='logo' src="images/bat.png" alt="logo">
            <h1>Créez votre compte</h1>
            <form action="/action_page.php">
                <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo"><br>
                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe"><br>
                <input type="password" id="verifmdp" name="verifmdp" placeholder="Vérification du mot de passe"><br><br>

            <input type="submit" class='sub' value="Envoyer">
            </form> 
            <a class="close" href=""><img class ='_close' src="images/x-button.png" alt="X"></a>

        </div>
    </div>
    <!--Popup de connexion-->
    <div id="connexion" class="overlay">
        <div class="popup">
            <img class ='logo' src="images/bat.png" alt="logo">
            <h1>Connectez-vous</h1>
            <form action="/action_page.php">
                <input type="text" id="login" name="login" placeholder="Pseudo"><br>
                <input type="password" id="mpd" name="mpd" placeholder="Mot de passe"><br>
            <input type="submit" class='sub' value="Envoyer">
            </form> 
            <a class="mdp" href="">Mot de passe oublié ?</a>
            <a class="close" href=""><img class ='_close' src="images/x-button.png" alt="X"></a>

        </div>
    </div>
     
</body>
</html>