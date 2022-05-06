<?php

function getbook()
{
    $post = "";
    $connexion = connect();
    $requete_limite = 'SELECT MAX(postId) AS Maximum FROM twoots';
    $resultat_limite = mysqli_query($connexion, $requete_limite);

    if (!$resultat_limite){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $limite = mysqli_fetch_assoc($resultat_limite);
    $limite = (int)$limite['Maximum'];

    for($i = $limite; $i >= 1; $i--) {
        $requete = "SELECT * FROM twoots  WHERE postId = '{$i}'";
        $resultat = mysqli_query($connexion, $requete);

        if (!$resultat) {
            echo "<p>Erreur d'exécution de la requete :" . mysqli_error($connexion) . "</p>";
            die();
        }
        $ligne = $resultat->fetch_assoc();

        $userId = $ligne['userId'] . ' ';
        $content = $ligne['content'];
        $date = $ligne['date'];
        $likeCount = $ligne['likeCount'];
        $mediaPath = $ligne['mediaPath'];
        $postId = $ligne['postId'];


        $requete2 = "SELECT * FROM `users`";
        $resultat2 = mysqli_query($connexion, $requete2);
        if ($resultat2 == NULL) {
            return false;
        }
        while ($ligne2 = $resultat2->fetch_assoc()) {
            if ($ligne2['id'] == $userId) {
                $nickname = $ligne2['nickname'];
                $name = GetUserName($nickname);
                if($name == ""){
                    $name = $nickname;
                }
                $post .= "<div class='other_tweet'>
                    <div class='profil_msg'>
                        <div class='other_profile'>
                            <img src=" . GetUserPdpPath($nickname) . " alt='photo de profil'>
                        </div>
                    <div class='name_msg'>
                    
                        <span><p><a href='../pages/other_profil.php?pseudo=$nickname'><b>" . $name . "</b></a><i class='fa-solid fa-badge-check'></i>@$nickname<small>$date</small></p></span>
                    <div class='msg'>
                        <p>$content</p>
                    </div>
                    </div>
                    </div>
                    <div class='image_video'>
                    <img src=$mediaPath alt=''>
                    </div>
                        <div class='your_reaction'>
                            <div class='comment'><i class='fa-solid fa-comment'></i><p>". random_int(0, 100) ."</p></div>
                            <div class='retweet'><i class='fa-solid fa-retweet'></i><p>". random_int(0, 100) ."</p></div>
                            <div class='like'><i class='fa-solid fa-heart'></i></a><p>". random_int(0, 100) ."</p></div>
                            <div class='bookmark'><a href='../tools/_bookmark.php/?postId=$postId'><i class='fa-solid fa-bookmark'></i></a><p>0</p></div>
                        </div>
                    </div>";

            }
        }
    }
    return $post;
}

?>