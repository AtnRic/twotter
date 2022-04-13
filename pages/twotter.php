<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Twotter">
    <meta name="keywords" content="twotter">
    <meta name="author" content="Antoine RICHARD, Adrien VERHAEGHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twotter - Twoots</title>
    <link rel="stylesheet" href="../css/twotter-css/twotter-light.css">
    <link rel="stylesheet" href="../css/twotter-css/twotter.css">
    <link rel="icon" type="image/png" href="../images/bat.png" />
</head>

<body>
<!--sidebar-->
    <div class="left">
        <img id="logo" src="../images/bat.png" alt="logo">
        <!--navbar-->
        <nav class="sidebar">
            <a class="button" href="">
                <div class="image_texte">
                    <div class="image">
                        <img src="../images/icons/home_black_24dp.svg" alt="Accueil">
                    </div>
                    <div class="texte">
                        <span>Accueil</span>
                    </div>
                </div>
            </a>
            <a class="button" href="">
                <div class="image_texte">
                    <div class="image">
                        <img src="../images/icons/trending_up_black_24dp.svg" alt="Tendances">
                    </div>
                    <div class="texte">
                        <span>Tendances</span>
                    </div>
                </div>
            </a>
            <a class="button" href="">
                <div class="image_texte">
                    <div class="image">
                        <img src="../images/icons/turned_in_not_black_24dp.svg" alt="Enregistré">
                    </div>
                    <div class="texte">
                        <span>Enregistré</span>
                    </div>
                </div>
            </a>
            <a class="button" href="">
                <div class="image_texte">
                    <div class="image">
                        <img src="../images/icons/account_circle_black_24dp.svg" alt="Profil">
                    </div>
                    <div class="texte">
                        <span>Profil</span>
                    </div>
                </div>
            </a>
            <a class="button" href="">
                <div class="image_texte">
                    <div class="image">
                        <img src="../images/icons/settings_black_24dp.svg" alt="Paramètres">
                    </div>
                    <div class="texte">
                        <span>Paramètres</span>
                    </div>
                </div>
            </a>
            <a class="button" href="">
                <div class="image_texte">
                    <div class="image">
                        <img src="../images/icons/logout_black_24dp.svg" alt="Déconnexion">
                    </div>
                    <div class="texte">
                        <span>Déconnexion</span>
                    </div>
                </div>
            </a>
        </nav>
    </div>




    <div class="center">
        <div class="feed">
            <!--feed header-->
            <div class="feed_header">
                <h2>Accueil</h2>
            </div>
            <!--twoot box-->
            <div class="twoot">
                <form action="" method="POST">
                    <div class="twoot_input">
                        <img src="../images/icons/account_circle_black_24dp.svg" alt="Profil">
                        <label>
                            <input type="text" placeholder="Quoi de neuf ?"><!--textarea ?-->
                        </label>
                    </div>
                    <button class="twoot_post">Twooter</button>
                </form>
            </div>
            <!--posts-->
            <div class="post">
                <div class="img_profil">
                    <img src="../images/icons/account_circle_black_24dp.svg" alt="Profil">
                </div>
                <div class="post_body">
                    <div class="post_header">
                        <div class="post_header_text">
                            <h3>
                                Prénom Nom
                                <span class="verif">
                                <img src="../images/icons/verified_black_24dp.svg" alt="verif"> @pseudo
                            </span>
                            </h3>
                        </div>
                        <div class="post_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adisicing elit.</p>
                        </div>
                    </div>
                    <img src="../images/bat.png" alt="image post">
                    <div class="post_footer">
                        <!--icones commenter, like, etc...-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right">
        <h1>Ça se passe<br>maintenant.</h1>
        <h2>Rejoignez Twotter dès aujourd'hui.</h2>
        <a class="button" href="">S'inscrire</a>
        <h3>Vous avez déjà un compte ?</h3>
        <a class="button" href="">Se connecter</a>
    </div>

</body>
</html>