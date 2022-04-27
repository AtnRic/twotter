<?php

function GetLikeHTML($nickname, $postid)
{
    $connexion = connect();
    $requete = "SELECT * FROM `likes`";
    $resultat = mysqli_query($connexion, $requete);
    if ($resultat == NULL){
       echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
       return false;
    }
    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        $post = $ligne['postId'];
        if($nickname == $pseudo && $postId == $post)
        {                   
            return "<div id='$postId' class='like'><a onclick='hello();'><i class='fa-solid fa-heart'></i></a><p>". random_int(0, 100) ."</p></div>";
        }
    }                    
    return "<div id='$postId' class='like'><a onclick='hello();'><i class='fa-solid fa-heart'></i></a><p>". random_int(0, 100) ."</p></div>";
}

function Like($nickname, $postid)
{
    $requete = "SELECT * FROM `likes`";
    $resultat = mysqli_query($connexion, $requete);
    if ($resultat == NULL){
       echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
       return false;
    }
    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        if($nickname == $pseudo)
        {
            echo Console("Same nickname.");
            $userId = GetUserId($nickname);
            $requete2 = "INSERT INTO `likes` (`userId`, `postId`, `nickname`) VALUES ('$userId', '$postid', '$nickname')";
            $resultat2 = mysqli_query($connexion, $requete2);
            if ($resultat2 == NULL){
                echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
                return false;
            }

        }
    }
}

?>


