<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Twotter">
    <meta name="keywords" content="twotter">
    <meta name="author" content="Antoine RICHARD, Adrien VERHAEGHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twotter - Twoots</title>
    <link rel="stylesheet" href="../css/twotter-css/twotter.css">
    <link rel="icon" type="image/png" href="../images/bat.png" />
</head>
<body>
    <div class="container">
        <!--sidebar-->
        <div class="option_menu">
            <div class="option_center">
                <div class="logo">
                    <!--logo twotter-->
                    <div class="option">
                        <div><a href=""><i class="home"></i><span>Accueil</span></a></div>
                        <div><a href=""><i class="trends"></i><span>Tendances</span></a></div>
                        <div><a href=""><i class="bookmarks"></i><span>Enregistré</span></a></div>
                        <div><a href=""><i class="user"></i><span>Profil</span></a></div>
                        <div><a href=""><i class="settings"></i><span>Paramètres</span></a></div>
                        <div><a href=""><i class="logout"></i><span>Déconnexion</span></a></div>
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
                    <i class="star"></i>
                </span>
            </div>
            <div class="you_tweet_other_tweet">
                <div class="your_tweet">
                    <div class="profil_message">
                        <span><img src="../images/bat.png" alt=""></span>
                        <span><label><input type="text" placeholder="Quoi de neuf ?"></label></span>
                    </div>

                </div>
                <div class="add_extra">
                    <div class="image_more">
                        <span><a href=""><i class="picture"></i></a></span>
                        <span><a href=""><i class="bars"></i></a></span>
                        <span><a href=""><i class="smile"></i></a></span>
                        <span><a href=""><i class="calender"></i></a></span>
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
                            <img src="../images/bat.png" alt="photo de profil">
                        </div>
                        <div class="name_msg">
                            <span><p><b>Prénom Nom</b><i class="check"></i>@pseudo <small>date</small></p></span>
                            <div class="msg">
                                <p>Lorem ipsum, dolor sit amet</p>
                            </div>
                        </div>
                        <div class="more_options">
                            <i class="ellipsis"></i>
                        </div>
                    </div>
                    <div class="image_video">
                        <img src="../images/image.png" alt="">
                    </div>
                    <div class="your_reaction">
                        <div class="comment"><i class="comment_logo"></i><p>12</p></div>
                        <div class="retweet"><i class="rt_logo"></i><p>12</p></div>
                        <div class="like"><i class="like_logo"></i><p>12</p></div>
                        <div class="bookmark"><i class="bookmark_logo"></i><p>12</p></div>
                    </div>
                </div>
                <div class="other_tweet">
                    <div class="profil_msg">
                        <div class="other_profile">
                            <!--photo profil-->
                            <img src="../images/bat.png" alt="photo de profil">
                        </div>
                        <div class="name_msg">
                            <span><p><b>Prénom Nom</b><i class="check"></i>@pseudo <small>date</small></p></span>
                            <div class="msg">
                                <p>Lorem ipsum, dolor sit amet</p>
                            </div>
                        </div>
                        <div class="more_options">
                            <i class="ellipsis"></i>
                        </div>
                    </div>
                    <div class="image_video">
                        <img src="../images/image.png" alt="">
                    </div>
                    <div class="your_reaction">
                        <div class="comment"><i class="comment_logo"></i><p>12</p></div>
                        <div class="retweet"><i class="rt_logo"></i><p>12</p></div>
                        <div class="like"><i class="like_logo"></i><p>12</p></div>
                        <div class="bookmark"><i class="bookmark_logo"></i><p>12</p></div>
                    </div>
                </div>
            </div>
        </div>
        <!--trending menu-->
        <div class="trending_menu">
            <div class="trending_center">
                <div class="search">
                    <label><input type="search" placeholder="Chercher sur Twotter"></label>
                    <span><i class="search_logo"></i></span>
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
                                    <p>twoot trend</p>
                                </div>
                                <div class="subject">
                                    <p>Hello world (subject)</p>
                                </div>
                                <div class="trend_with">
                                    <p>trending with <a href="">#Machinàremplacer</a>,<a href="">#AutreTrucARenplacer</a> </p>
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