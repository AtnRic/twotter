<?php 

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
            return;     
        }
    }    
    $connexion = connect();               
    $requete = "INSERT INTO `books` (`userId`, `postId`) VALUES ('$id', '$postId')";
    $resultat = mysqli_query($connexion, $requete); 
}

?>