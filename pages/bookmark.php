<!DOCTYPE html>
<html lang='fr'>

<!--le header se trouve dans le fichier header.php-->
<?php
$pageName="Paramètres"; //le nom de la page
$cssPath = "twotter-css/twotter.css";
$cssPath2 = "settings.css";
$cssPath_light = "twotter-css/twotter-light.css";
$cssPath_dark = "twotter-css/twotter-dark.css";

require '../tools/header.php'
?>

<body>
<div class="container">
    <!--sidebar-->
    <?php
    include '../tools/_main_tools.php';
    include '../tools/sidebar.php' ;
    ?>
    <!--content menu-->
    <div class="content_menu">
        <div class="prefer">
                <span>
                    <a href="">Enregistré</a>
                </span>
        </div>

        <div class="others_tweets">
            <!--each person-->
            <?php
            include '../tools/_bookmark.php';
            echo @getbook(); //on désactive les avertissements au cas où un post est supprimé
            ?>
        </div>
    </div>
    <!--trending menu-->
    <?php
    include '../tools/trends.php';
    ?>
</div>
</body>
</html>