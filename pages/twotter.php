<!DOCTYPE html>
<html lang='fr'>
<!--le header se trouve dans le fichier header.php-->

<?php
$pageName="Twoots"; //le nom de la page
$cssPath = "twotter-css/twotter.css";
$cssPath_light = "twotter-css/twotter-light.css";
$cssPath_dark = "twotter-css/twotter-dark.css";

require '../tools/header.php'
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
                                <span><img src="../images/bat.png" alt="photo de profil"></span>
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
                <div class="other_tweet">
                    <div class="profil_msg">
                        <div class="other_profile">
                            <!--photo profil-->
                            <img src="../images/pp/karadoc.PNG" alt="photo de profil">
                        </div>
                        <div class="name_msg">
                            <span><p><b>Karadoc de Vannes</b><i class="fa-solid fa-badge-check"></i>@Karadoc <small>Today</small></p></span>
                            <div class="msg">
                                <p>Le CSS :</p>
                            </div>
                        </div>
                    </div>
                    <div class="image_video">
                        <img src="../images/media/trouver-utilisation-perimetrique.gif" alt="">
                    </div>
                    <div class="your_reaction">
                        <div class="comment"><i class="fa-solid fa-comment"></i><p>12</p></div>
                        <div class="retweet"><i class="fa-solid fa-retweet"></i><p>12</p></div>
                        <div class="like"><i class="fa-solid fa-heart"></i><p>12</p></div>
                        <div class="bookmark"><i class="fa-solid fa-bookmark"></i><p>12</p></div>
                    </div>
                </div>
                <div class="other_tweet">
                    <div class="profil_msg">
                        <div class="other_profile">
                            <!--photo profil-->
                            <img src="../images/pp/arthur.PNG" alt="photo de profil">
                        </div>
                        <div class="name_msg">
                            <span><p><b>Arthur Roi de Bretagne</b><i class="fa-solid fa-badge-check"></i>@Arthur <small>Today</small></p></span>
                            <div class="msg">
                                <p>Ne m'appelez pas Sire !</p>
                            </div>
                        </div>
                    </div>
                    <div class="image_video">
                        <img src="../images/media/terme-elegant.gif" alt="">
                    </div>
                    <div class="your_reaction">
                        <div class="comment"><i class="fa-solid fa-comment"></i><p>35</p></div>
                        <div class="retweet"><i class="fa-solid fa-retweet"></i><p>12k</p></div>
                        <div class="like"><i class="fa-solid fa-heart"></i><p>18k</p></div>
                        <div class="bookmark"><i class="fa-solid fa-bookmark"></i><p>20</p></div>
                    </div>
                </div>
                <div class="other_tweet">
                    <div class="profil_msg">
                        <div class="other_profile">
                            <!--photo profil-->
                            <img src="../images/pp/burgonde.PNG" alt="photo de profil">
                        </div>
                        <div class="name_msg">
                            <span><p><b>Roi Burgonde</b><i class="check"></i>@Rburgonde <small>Today</small></p></span>
                            <div class="msg">
                                <p>J'apprécie des fruits au sirop</p>
                            </div>
                        </div>
                    </div>
                    <div class="image_video">
                        <img src="" alt="">
                    </div>
                    <div class="your_reaction">
                        <div class="comment"><i class="fa-solid fa-comment"></i><p>12</p></div>
                        <div class="retweet"><i class="fa-solid fa-retweet"></i><p>12</p></div>
                        <div class="like"><i class="fa-solid fa-heart"></i><p>12</p></div>
                        <div class="bookmark"><i class="fa-solid fa-bookmark"></i><p>12</p></div>
                    </div>
                </div>
                <div class="other_tweet">
                    <div class="profil_msg">
                        <div class="other_profile">
                            <!--photo profil-->
                            <img src="../images/pp/arthur.PNG" alt="photo de profil">
                        </div>
                        <div class="name_msg">
                            <span><p><b>Arthur Roi de Bretagne</b><i class="check"></i>@Arthur <small>Today</small></p></span>
                            <div class="msg">
                                <p>Quand tu merge 2 branches, git be like :</p>
                            </div>
                        </div>
                    </div>
                    <div class="image_video">
                        <img src="../images/media/le-nouveau-code.gif" alt="">
                    </div>
                    <div class="your_reaction">
                        <div class="comment"><i class="fa-solid fa-comment"></i><p>12</p></div>
                        <div class="retweet"><i class="fa-solid fa-retweet"></i><p>12</p></div>
                        <div class="like"><i class="fa-solid fa-heart"></i><p>12</p></div>
                        <div class="bookmark"><i class="fa-solid fa-bookmark"></i><p>12</p></div>
                    </div>
                </div>
                <div class="other_tweet">
                    <div class="profil_msg">
                        <div class="other_profile">
                            <!--photo profil-->
                            <img src="../images/pp/burgonde.PNG" alt="photo de profil">
                        </div>
                        <div class="name_msg">
                            <span><p><b>Roi Burgonde</b><i class="check"></i>@Rburgonde <small>Today</small></p></span>
                            <div class="msg">
                                <p>Git quand il y a un conflit de version :</p>
                            </div>
                        </div>
                    </div>
                    <div class="image_video">
                        <img src="../images/media/quest-ce-a-dire-que-ceci.gif" alt="">
                    </div>
                    <div class="your_reaction">
                        <div class="comment"><i class="fa-solid fa-comment"></i><p>12</p></div>
                        <div class="retweet"><i class="fa-solid fa-retweet"></i><p>12</p></div>
                        <div class="like"><i class="fa-solid fa-heart"></i><p>12</p></div>
                        <div class="bookmark"><i class="fa-solid fa-bookmark"></i><p>12</p></div>
                    </div>
                </div>
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