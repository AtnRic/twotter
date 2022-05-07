<!DOCTYPE html>
<html lang='fr'>
<?php
$pseudo = $_GET['pseudo'];//le pseudo de l'utilisateur à afficher (passé dans l'url)
$pageName="Profil"; //le nom de la page
$cssPath = "twotter-css/twotter.css";//le chemin vers la page css principale
$cssPath_light = "twotter-css/twotter-light.css";//le chemin vers la page css pour les couleurs claires
$cssPath_dark = "twotter-css/twotter-dark.css";//le chemin vers la page css pour les couleurs sombres

require '../tools/header.php'//le header de la page
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
    $name = $pseudo;//si l'utilisateur n'a pas défini de nom, on affiche son pseudo
}
if($desc = "" || $desc == null){
    $desc = "L'utilisateur n'a pas encore défini de description.";
}
if($ban = "" || $ban == null){
    $ban = "../images/ban/banner.png";
}
?>
    <?php echo"
<div class='content_menu'><!--la div centrale-->
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
                  background-image: url(". GetUserBanPath($pseudo) .");
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
                    <p>" . GetUserDesc($pseudo) . "</p>
                </div>
            </div>
        </div>";?>
        <div class="others_tweets">
            <!--each person-->
            <?php
            try {
                echo @getUserTwoots($pseudo);//on affiche les twoots de l'utilisateur
            } catch (Exception $e) {
            }
            ?>
        </div>
    </div>
    <!--trending menu-->
    <?php
    include "../tools/trends.php";//les trends
    ?>

</body>
</html>
