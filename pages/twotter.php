<!DOCTYPE html>
<html lang='fr'>

<!--le header se trouve dans le fichier header.php-->

<?php
$pageName="Twoots"; //le nom de la page
$cssPath = "twotter-css/twotter.css";
$cssPath_light = "twotter-css/twotter-light.css";
$cssPath_dark = "twotter-css/twotter-dark.css";

require '../tools/header.php';
require '../tools/_main_tools.php';
?>

<body>
    <div class="container">
        <!--sidebar-->
        <?php include '../tools/sidebar.php' ?>
        <!--content menu-->
        <div class="content_menu">
            <div class="prefer">
                <span>
                    <a href="">Accueil</a>
                </span>
            </div>
            <div class="you_tweet_other_tweet">
                <div class="your_tweet">
                    <div class="profil_message">
                        <form action="../tools/upload.php" method='POST' enctype="multipart/form-data">
                            <div class="center_div">
                                <?php
                                $pdp = GetUserPdpPath($_COOKIE['login']);//on récupère le chemin de la photo de profil
                                echo "<span><img src='$pdp' alt='photo de profil'></span>";
                                ?>
                                <label for="twoot"></label><input class="twoot" type="text" id="twoot" name="twoot" placeholder="Quoi de neuf ?" required >
                            </div>
                            <span class="label-file"><label for="file"><i class="fa-solid fa-image"></i></label></span>
                            <input id="file" class="input-file" type="file" name="file">
                            <input type="submit" class="sub_twoot" name='sub' value="Twoot">
                        </form>
                    </div>
                </div>
            </div>

            <div class="others_tweets">
                <!--each person-->
                <?php
                    echo @getTwoots(); //on affiche les twoots (et on désactive les avertissements au cas où un post est supprimé)
                ?>
            </div>
        </div>
        <!--trending menu-->
        <?php include '../tools/trends.php'; ?>
    </div>
</body>
</html>