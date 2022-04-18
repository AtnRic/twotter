<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Twotter">
    <meta name="keywords" content="twotter">
    <meta name="author" content="Antoine RICHARD, Adrien VERHAEGHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twotter - Twoots</title>
    <script src="https://kit.fontawesome.com/235593db07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/twotter-css/twotter.css">
    <link rel="stylesheet" href="../css/twotter-css/twotter-light.css">
    <link rel="icon" type="image/png" href="../images/bat.png" />
</head>
<body>
    <div class="container">
        <!--sidebar-->
        <div class="option_menu">
            <div class="option_center">
                <div class="logo">
                    <img src="../images/bat.png" alt="logo">
                    <div class="option">
                        <div><a href=""><i class="fa-solid fa-house"></i><span>Accueil</span></a></div>
                        <div><a href=""><i class="fa-solid fa-arrow-trend-up"></i><span>Tendances</span></a></div>
                        <div><a href=""><i class="fa-solid fa-bookmark"></i><span>Enregistré</span></a></div>
                        <div><a href=""><i class="fa-solid fa-user"></i><span>Profil</span></a></div>
                        <div><a href=""><i class="fa-solid fa-gear"></i><span>Paramètres</span></a></div>
                        <div><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Déconnexion</span></a></div>
                        <div><button>Twoot</button></div>
                    </div>
                </div>
            </div>
        </div>
        <!--content menu-->
        <div class="content_menu">
            <div class="prefer">
                <span>
                    <a href="">Accueil</a>
                </span>
                <span>
                    <i class="fa-solid fa-badge-check"></i>
                </span>
            </div>
            <div class="you_tweet_other_tweet">
                <div class="your_tweet">
                    <div class="profil_message">
                        <span><img src="../images/bat.png" alt=""></span>
                        <span><label><input type="text" placeholder="Quoi de neuf ?"></label></span>
                    </div>
                    <span><button>Twoot</button></span>
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
                    <label><input type="search" placeholder="Chercher sur Twotter"></label>
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