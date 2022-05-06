<!DOCTYPE html>
<html lang='fr'>
<?php
$pseudo = $_GET['pseudo'];

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
    include '../tools/_main_tools.php';
    include '../tools/sidebar.php';


    $ban = GetUserBanPath($pseudo);
    $pdp = GetUserPdpPath($pseudo);
    $desc = GetUserDesc($pseudo);
    $name = GetUserName($pseudo);



if($name = "" || $name == null){
    $name = $pseudo;
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
                <span><p><b>". GetUserName($pseudo) ."</b><i class='fa-solid fa-badge-check'></i>@$pseudo</p></span>
                <!--description-->
                <div class='msg'>
                    <p>". GetUserDesc($pseudo) . "</p>
                </div>
            </div>
        </div>";
    ?>
        <div class="others_tweets">
            <!--each person-->
            <?php
                    //$nickname = $_COOKIE['login'];
                    //echo Console("Votre Id : " .$_COOKIE['login']);
                    echo @getUserTwoots($pseudo);
            ?>
        </div>
    </div>
    <!--trending menu-->
    <?php
    include "../tools/trends.php";
    ?>

</body>
</html><?php
