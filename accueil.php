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
            <a class="button" href="red-november.html">Se connecter</a>
        </div>
    </div>

    <!--Pop-up d'inscription-->
    <div id="inscription" class="overlay">
        <div class="popup">
            <img class ='logo' src="images/bat.png" alt="logo">
            <form action="/action_page.php">
                <input type="text" id="nom" name="nom" placeholder="Nom"><br>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom"><br>
                <input type="text" id="mail" name="mail" placeholder="Adresse mail"><br><br>

            <input type="submit" id='sub' value="Envoyer">
            </form> 
            <a class="close" href="#">&times;</a>

        </div>
    </div>
    <div id="connexion" class="overlay">
        <div class="popup">
            <img class ='logo' src="images/bat.png" alt="logo">
            <form action="/action_page.php">
                <input type="text" id="nom" name="nom" placeholder="Nom"><br>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom"><br>
                <input type="text" id="mail" name="mail" placeholder="Adresse mail"><br><br>

            <input type="submit" id='sub' value="Envoyer">
            </form> 
            <a class="close" href="#">&times;</a>

        </div>
    </div>
     
</body>
</html>