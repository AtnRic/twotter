<?php
    session_start();
    if(isset($_COOKIE['login']) && isset($_COOKIE['mdp_hash'])) { //si le cookie existe
        $newURL = "pages/twotter.php";
        header('Location: '.$newURL);
        die();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
    <meta name="description" content="Twotter">
    <meta name="keywords" content="twotter">
    <meta name="author" content="Antoine RICHARD, Adrien VERHAEGHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Twotter</title>
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
                <label for="pseudo"></label><input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" autofocus required ><br>
                <label for="mdpin"></label><input type="password" id="mdpin" name="mdpin" placeholder="Mot de passe (8 caractères, maj, min et chiffres)" required><br>
                <label for="verifmdp"></label><input type="password" id="verifmdp" name="verifmdp" placeholder="Vérification du mot de passe" required><br><br>
                <input type="submit" class='sub' name='sub' value="Envoyer">
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
            <form action="" method='POST'>
                <label for="login"></label><input type="text" id="login" name="login" placeholder="Pseudo" autofocus required><br>
                <label for="mpdco"></label><input type="password" id="mdpco" name="mdpco" placeholder="Mot de passe" required><br>
            <input type="submit" class='sub' value="Envoyer">
            </form> 
            <a class="mdp" href="pages/mdp.html">Mot de passe oublié ?</a>  
        </div>
    </div>
</body>


    <?php
    include 'tools/_connect.php';
    // Register.
        $count = 0;
        if(isset($_POST['mdpin']))
        {
            if(!passwd($_POST['mdpin'])){
                echo Console("Password wrong.");
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
            else{
                $count++;
            }
            //on profite du isset pour le mot de passe pour verifier que les autres champs soient biens remplis
            if(empty($_POST['pseudo'])){
                echo Console("Pseudo empty.");
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
            else{
                $count++;
            }

        if(empty($_POST['mdpin'])){
            echo Console("Password empty.");

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
                echo Console("Password empty.");

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
        if(isset($_POST['mdpin']) && isset($_POST['verifmdp'])){
            if(!verifpasswd($_POST['mdpin'], $_POST['verifmdp'])){
                echo Console("Password 1 != 2");

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
            else{
                $count++;
            }
        }
        
        if($count == 3)
        {
            $sign = signup($_POST['pseudo'], $_POST['mdpin'], $_POST['verifmdp']);

            if($sign == true){                
            echo Console("Connected to twooter.");
            $count++;
            }  
            else{            
            echo Console("Signup fail.");
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
        }

        //si les 3 conditions sont vérifiées :
        if($count==4)
        {
            echo Console("Not to twooter.");

            $login= $_POST['pseudo'];
            $mdp_hash = hash('sha256', $_POST['mdpin']);//on fait un hash du mot de passe pour ne pas stocker le mot de passe en clair
            $_SESSION["pseudo"]=$login; //Variable de session "pseudo"
            if (!isset($_COOKIE['pseudo']) && !isset($_COOKIE['mdp_hash'])){
                setcookie("login", $login, time() + (3600 * 24 * 365));
                setcookie("mdp_hash", $mdp_hash, time() + (3600 * 24 * 365));
            }
            //ajouter utilisateur dans la base de données
            $newURL = "pages/twotter.php";
            header('Location: '.$newURL);
            die();
        }

    // Login.
        $count = 0;
        if(isset($_POST['mdpco'])){

                //on profite du isset pour le mot de passe pour verifier que les autres champs soient biens remplis
                if(empty($_POST['login'])){
                    echo "<style>
                        .popup #login{
                            outline: none;
                            border-style: solid;
                            border-radius: 5px;
                            border-width: 2px;
                            border-color:red;
                        }
                        </style>"; 
                }
                else{
                    $count++;
                }

                if($count == 1)
                {                        
                    $sign = signin($_POST['login'], $_POST['mdpco']);
                    if($sign == true){
                        $count++;
                        echo Console("Connected to twooter.");
                    }   
                    else{
                    echo "<style>
                    .popup #login{
                        outline: none;
                        border-style: solid;
                        border-radius: 5px;
                        border-width: 2px;
                        border-color:red;
                    }
                    </style>"; 
                    }
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
            
        //si les 2 conditions sont vérifiées :
        if($count==2)
        {
                $login= $_POST['login'];
                $mdp_hash = hash('sha256', $_POST['mdpco']);//on fait un hash du mot de passe pour ne pas stocker le mot de passe en clair
                $_SESSION["pseudo"]=$login; //Variable de session "pseudo"
                if (!isset($_COOKIE['pseudo']) && !isset($_COOKIE['mdp_hash'])){
                    setcookie("login", $login, time() + (3600 * 24 * 365));
                    setcookie("mdp_hash", $mdp_hash, time() + (3600 * 24 * 365));
                }
                //ajouter utilisateur dans la base de données
                $newURL = "pages/twotter.php";
                header('Location: '.$newURL);
                die();
        }
    
    
    
    
    ?>

</html>