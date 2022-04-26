<!DOCTYPE html>
<html lang='fr'>
<!--le header se trouve dans le fichier header.php-->

<?php
$pageName="Profil"; //le nom de la page
$cssPath = "twotter-css/twotter.css";
$cssPath_light = "twotter-css/twotter-light.css";
$cssPath_dark = "twotter-css/twotter-dark.css";

require '../tools/header.php'
?>

<body>
<div class="container">
    <!--sidebar-->
    <?php    
    include '../tools/_connect.php';
    include '../tools/sidebar.php';

    $nickname = $_COOKIE['login'];
    $ban = GetUserBanPath($nickname);
    $pdp = GetUserPdpPath($nickname);
    $desc = GetUserDesc($nickname);
    $name = GetUserName($nickname);

    

if($name = "" || $name == null){
    $name = $_COOKIE['login'];
}
if($desc = "" || $desc == null){
    $desc = "L'utilisateur n'a pas encore défini de description.";
}
if($ban = "" || $ban == null){
    $ban = "../images/banner.png";
}
    echo "<div class='content_menu'>
        <div class='prefer'>
                <span>
                    <a href=''>Profil</a>
                </span>
        </div>
        <div class='profile_box'>
            <div class='banner'>
                <!--bannière-->
                <style>.banner{
                        height: 200px;
                        width: 100%;
                        background-position: center;
                        background-size: cover;
                        background-image: url($ban)
                    }
                </style>
            </div>
            <div class='other_profile' id='profile_img'>
                <!--photo profil-->
                <img src='$pdp' alt='photo de profil'>
            </div>
            <div class='name_msg' id='profil_name'>
                <span><p><b>". GetUserName($nickname) ."</b><i class='fa-solid fa-badge-check'></i>@$nickname</p></span>
                <!--description-->
                <div class='msg'>
                    <p>". GetUserDesc($nickname) . "</p>
                </div>
            </div>
        </div>";
    ?>
        <div class="others_tweets">
            <!--each person-->
            <?php
                    $nickname = $_COOKIE['login'];
                    echo Console("Votre Id : " .$_COOKIE['login']);
                    echo @getUserTwoots($nickname);
            ?>
        </div>
    </div>
    <!--trending menu-->
    <div class="trending_menu">
        <div class="trending_center">
            <div class="search">
                <label class="input_search"><input type="search" placeholder="Chercher sur Twotter"></label>
                <span><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <div class="trending">
                <div class="header">
                    <p>Ce qu'il se passe</p>
                </div>
                <div class="trends">
                    <!--each trends-->
                    <div class="trend">
                        <div class="trend_msg">
                            <div class="trend_name">
                                <p>Kaamelott</p>
                            </div>
                            <div class="subject">
                                <p>Kaamelott</p>
                            </div>
                            <div class="trend_with">
                                <p>trending with : <br><a href="">#ProvencalLeGaulois</a></p>
                            </div>
                        </div>
                    </div>
                    <!--each trends-->
                    <div class="trend">
                        <div class="trend_msg">
                            <div class="trend_name">
                                <p>twoot trend</p>
                            </div>
                            <div class="subject">
                                <p>Hello world (subject)</p>
                            </div>
                            <div class="trend_with">
                                <p>trending with : <br><a href="">#Machinàremplacer</a>, <a href="">#AutreTrucARenplacer</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="show_more">
                    <a href="">En voir plus</a>
                </div>

            </div>
        </div>
    </div>

</body>
</html><?php
