<?php

include '_main_tools.php';


function getbook()
{
    $post = "";
    $connexion = connect();
    $requete = "SELECT * FROM `books`";
    $resultat = mysqli_query($connexion, $requete);
    if ($resultat == NULL){
       echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
       return false;
    }
    while ($ligne = $resultat -> fetch_assoc()) {
        $post = $post . getIdTwoots($ligne['postId']);
    }    
    return $post;
}

if(isset($_GET['postId']))
{                 
    $nickname = $_COOKIE['login'];
    $postId = $_GET['postId'];

    $connexion = connect();
    $requete = "SELECT * FROM `books`";
    $resultat = mysqli_query($connexion, $requete);
    if ($resultat == NULL){
       echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
       return false;
    }
    while ($ligne = $resultat -> fetch_assoc()) {
        $id = $ligne['userId']; 
        $post = $ligne['postId'];
        if($id == GetUserId($nickname) && $postId == $post)
        {   
            $connexion = connect();
            $requete = "DELETE FROM `books` WHERE `books`.`userId` = $id AND `books`.`postId` = $postId";
            $resultat = mysqli_query($connexion, $requete); 
            header("Location: ../../pages/bookmark.php");
        }
    }    
    $connexion = connect();    
    echo Console(GetUserId($nickname) . "  " .  $postId);    
    $id = GetUserId($nickname);       
    $requete = "INSERT INTO `books` (`userId`, `postId`) VALUES ('$id', '$postId')";
    $resultat = mysqli_query($connexion, $requete); 
    header("Location: ../../pages/bookmark.php");
}

?>