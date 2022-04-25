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
    include '../tools/_connect.php';
    include '../tools/sidebar.php' ;
    ?>
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
            <form action="../tools/desc.php" method="post">
                <div class="change_center">
                    <label for="nom"></label><input type="text" id="nom" name="nom" placeholder="Nom"><br>
                    <label for="desc"></label><input type="text" id="desc" name="desc" placeholder="Description"><br>
                    <input type="submit" class="sub" id="sub2" name='modif' value="Modifier">
                </div>
            </form>
        </div>
        <div class="change">
            <form action="../tools/pdp.php" method="post" enctype="multipart/form-data">
                <div class="change_center">
                    <span class="label-file">Photo de profil :<label for="file"><br><i class="fa-solid fa-image"></i></label></span>
                    <input id="file" class="input-file" type="file" name="fileP"><br>
                    <input type="submit" class="sub" id="sub2" name='modif' value="Modifier">
                </div>
            </form>
        </div>
        <div class="change">
            <form action="../tools/ban.php" method='post' enctype="multipart/form-data">
                <div class="change_center">
                    <span class="label-file">Bannière :<label for="file"><br><i class="fa-solid fa-image"></i></label></span>
                    <input id="file2" class="input-file" type="file" name="fileB"><br>
                    <input type="submit" class="sub" id="sub3" name='modif2' value="Modifier">
                </div>
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