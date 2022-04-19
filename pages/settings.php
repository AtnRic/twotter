<!DOCTYPE html>
<html lang='fr'>

<!--le header se trouve dans le fichier header.php-->
<?php
$pageName="Paramètres"; //le nom de la page
$cssPath = "twotter-css/twotter.css";
$cssPath2 = "settings.css";
$cssPath_light = "twotter-css/twotter-light.css";
$cssPath_dark = "twotter-css/twotter-dark.css";
include '../tools/header.php'
?>

<body>
<div class="container">
    <!--sidebar-->
    <?php include '../tools/sidebar.php' ?>
    <!--content menu-->
    <div class="content_menu">
        <div class="prefer">
                <span>
                    <a href="">Paramètres</a>
                </span>
        </div>

        <div class="theme">
            <p>Personnalisez votre affichage</p><br>
            <div class="choix_theme">
                <input type="checkbox" class="checkbox" id="chk" />
                <label class="label" for="chk">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                    <div class="ball"></div>
                </label>
                <input type="submit" class='sub' name='sub' value="Envoyer">
            </div>
        </div>
    </div>

</div>
</body>
</html>