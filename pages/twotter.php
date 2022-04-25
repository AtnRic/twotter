<!DOCTYPE html>
<html lang='fr'>
<!--le header se trouve dans le fichier header.php-->

<?php
$pageName="Twoots"; //le nom de la page
$cssPath = "twotter-css/twotter.css";
$cssPath_light = "twotter-css/twotter-light.css";
$cssPath_dark = "twotter-css/twotter-dark.css";

require '../tools/header.php';
require '../tools/_connect.php';


?>

<body>
    <div class="container">
        <!--sidebar-->
        <?php
        include '../tools/sidebar.php'
        ?>
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
                                $pdp = GetUserPdpPath($_COOKIE['login']);
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
                    echo getTwoots();
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
    </div>

</body>
</html>