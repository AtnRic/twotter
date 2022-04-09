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
            <form action="" method='POST'>
                <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo"><br>
                <input type="password" id="mdpin" name="mdpin" placeholder="Mot de passe (8 caractères, maj, min et chiffres)"><br>
                <?php if(isset($mdperr)){echo "<p style='color:white'>$mdperr</p>";}?>
                <input type="password" id="verifmdp" name="verifmdp" placeholder="Vérification du mot de passe"><br><br>

            <input type="submit" class='sub' value="Envoyer">
            </form> 
            <a class="close" href=""><img class ='_close' src="images/x-button.png" alt="X"></a>

        </div>
    </div>


    <!--Popup de connexion-->
    <div id="connexion" class="overlay">
        <div class="popup">
            <a class="close" href=""><img class ='_close' src="images/x-button.png" alt="X"></a>
            <img class ='logo' src="images/bat.png" alt="logo">
            <h1>Connectez-vous</h1>
            <form action="accueil.php" method='POST'>
                <input type="text" id="login" name="login" placeholder="Pseudo"><br>
                <input type="password" id="mpdco" name="mpdco" placeholder="Mot de passe"><br>
            <input type="submit" class='sub' value="Envoyer">
            </form> 
            <a class="mdp" href="pages/mdp.html">Mot de passe oublié ?</a>  
        </div>
    </div>



     
    <?php
    include 'tools/_connect.php';

    //on met la bordure de la case mot de passe (inscription) en rouge si le mot de passe ne respecte pas le pattern
        if(isset($_POST['mdpin'])){
            if(!passwd($_POST['mdpin'])){
                echo "<style>
                .popup #mdpin{
                    outline: none;
                    border-style: solid;
                    border-radius: 5px;
                    border-width: 2px;
                    border-color:red;
                }
                </style>"; 
            }
            //on profite du isset pour le mot de passe pour vérifier que les autres champs soient biens remplis
            if(empty($_POST['pseudo'])){
                echo "<style>
                    .popup #pseudo{
                        outline: none;
                        border-style: solid;
                        border-radius: 5px;
                        border-width: 2px;
                        border-color:red;
                    }
                    </style>"; 
            }
            if(empty($_POST['mdpin'])){
                echo "<style>
                    .popup #mdpin{
                        outline: none;
                        border-style: solid;
                        border-radius: 5px;
                        border-width: 2px;
                        border-color:red;
                    }
                    </style>"; 
            }
            if(empty($_POST['verifmdp'])){
                echo "<style>
                    .popup #verifmdp{
                        outline: none;
                        border-style: solid;
                        border-radius: 5px;
                        border-width: 2px;
                        border-color:red;
                    }
                    </style>"; 
            }

        }
        else{
            echo "<style>
            .popup input[type=text]:focus, input[type=password]:focus{
                outline: none;
                border-style: solid;
                border-radius: 5px;
                border-width: 2px;
                border-color:#119afb;
            }
            </style>";
        }

    //on vérifie les mdp (inscription)
        if(isset($_POST['mdpin'])&& isset($_POST['mdpin'])){
            if(!verifpasswd($_POST['mdpin'], $_POST['verifmdp'])){
                echo "<style>
                .popup #verifmdp, #mdpin{
                    outline: none;
                    border-style: solid;
                    border-radius: 5px;
                    border-width: 2px;
                    border-color:red;
                }
                </style>"; 
            }
        }

        
        

    ?>




</body>
</html>