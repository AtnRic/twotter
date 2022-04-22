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
                <form method="get" action="settings.php">
                    <input type="checkbox" class="checkbox"  name="theme" value="dark" id="chk"/>
                    <label class="label" for="chk">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                        <div class="ball"></div>
                    </label>
                    <br>
                    <input type="submit" class='sub' name='sub' value="Enregistrer">
                </form>
            </div>
        </div>
        <!--form nom/prénom/photo profil/bannière-->
        <div class="change">
            <form method="post">
                <label for="prenom"></label><input type="text" id="prenom" name="prenom" placeholder="Prénom"><br>
                <label for="nom"></label><input type="text" id="nom" name="nom" placeholder="Nom"><br>
                <span class="label-file">Photo de profil :<label for="file"><br><i class="fa-solid fa-image"></i></label></span>
                <input id="file" class="input-file" type="file" name="file"><br>
                <span class="label-file">Bannière :<label for="file"><br><i class="fa-solid fa-image"></i></label></span>
                <input id="banner" class="input-file" type="file" name="banner"><br>
                <input type="submit" class="modif" name='modif' value="Modifier">
            </form>

        </div>
    </div>
</div>
</body>
<!--traitement du choix du thème-->
<?php
@$theme = $_GET["theme"];
if(isset($_GET["theme"])){
    if($theme="dark"){
        $themeChoisi="dark";
    }
    else{
        $themeChoisi="light";
    }

}
else{
    $themeChoisi="light";
}
setcookie('theme', $themeChoisi, time() + (3600*24*365));
/*
if (isset($_GET["theme"])){
    header('Location: settings.php?theme=dark&sub=Enregistrer');
}*/
?>
</html>