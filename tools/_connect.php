<?php 

function connect()
{
    $hostname="localhost";//à changer
    $username="root";//nom d'utilisateur pour acc�der au serveur (root)
    $password="root"; //mot de passe pour acc�der au serveur (root)
    $dbname="twotter"; //nom de la base de donn�es
    
    $connexion = mysqli_connect($hostname, $username, $password, $dbname);

    if (!$connexion) {
        echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
        return (boolean)false;
        die();
    }
    else
    {
        echo Console('Cnt : ' . $hostname);
        return $connexion;
    }
}

//vérification d'un certain pattern de mdp
function passwd($mdp)
{
    $majuscule = preg_match('@[A-Z]@', $mdp);
    $minuscule = preg_match('@[a-z]@', $mdp);
    $chiffre = preg_match('@[0-9]@', $mdp);
            
    echo Console($majuscule);
    echo Console($minuscule);
    echo Console($chiffre);

    if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8){
        return (boolean)false;          
    }
    else{
        return (boolean)true;
    }
}

//vérifier que les mots de passe (inscription) sont identiques :
function verifpasswd($mdp, $verif)
{
        if($verif==$mdp){
            return (boolean)true;
        }
        else{
            return (boolean)false;
        }
}

function signup($pseudo, $mdp, $cmdp)
{
    $hostname="localhost";//à changer
    $username="root";//nom d'utilisateur pour acc�der au serveur (root)
    $password="root"; //mot de passe pour acc�der au serveur (root)
    $dbname="twotter"; //nom de la base de donn�es
    $connexion = mysqli_connect($hostname, $username, $password, $dbname);

    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    if ( $resultat == NULL){
       echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
       return (boolean)false;
    }

    $find = false;

    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        if($nickname == $pseudo){
            echo Console("Same nickname.");
            return (boolean)false;
        }
    }
    // Voir comment créer une table.
    $mdp_hash = hash('sha256', $_POST['mdpin']);//on fait un hash du mot de passe pour ne pas stocker le mot de passe en clair
    $requete2 = "INSERT INTO `users` (`nickname`, `password`) VALUES ('$pseudo', '$mdp_hash')"; //La requere SQL
    $resultat2 = mysqli_query($connexion, $requete2); //Executer la requete
    if ( $resultat2 == FALSE ){
        echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
        return (boolean)false;

    }
    else{
        return (boolean)true;
    }
}
				
function signin($pseudo, $mdp)
{
    $hostname="localhost";//à changer
    $username="root";//nom d'utilisateur pour acc�der au serveur (root)
    $password="root"; //mot de passe pour acc�der au serveur (root)
    $dbname="twotter"; //nom de la base de donn�es
    $connexion = mysqli_connect($hostname, $username, $password, $dbname);

    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    if ( $resultat == NULL){
        //return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        return (boolean)false;
    }
    $mdp_hash = hash('sha256', $_POST['mdpco']);//on fait un hash du mot de passe pour ne pas stocker le mot de passe en clair
    $find = false;

    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        $password = $ligne['password']; 
        $id = $ligne['id'];
        if($nickname == $pseudo){
            if($password == $mdp_hash){
                $find = true;
                return (boolean)true;
            }
            else{
                return (boolean)false;
            }
        }
    }
    return (boolean)false;
}

function getTwoots()
{
    $connexion = connect();
    $requete = "SELECT * FROM `twoots`";
    $resultat = mysqli_query($connexion, $requete);
    $post = "";

    if ( $resultat == NULL){
        //return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        return (boolean)false;
    }
    while ($ligne = $resultat -> fetch_assoc())
    {            
        $postId = $ligne['postId']; 
        $userId = $ligne['userId'] . ' '; 
        $content = $ligne['content'];         
        $date = $ligne['date']; 
        $likeCount = $ligne['likeCount'];         
        $mediaPath = $ligne['mediaPath']; 
        $requete2 = "SELECT * FROM `users`";
        $resultat2 = mysqli_query($connexion, $requete2);
        if ( $resultat2 == NULL){
            return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        }
        while ($ligne2 = $resultat2 -> fetch_assoc())
        {
            if($ligne2['id'] == $userId)
            {
                $nickname = $ligne2['nickname'];
                $post .= "<div class='other_tweet'>
                <div class='profil_msg'>
                    <div class='other_profile'>
                <!--photo profil-->
                        <img src=". GetUserPdpPath($nickname) ." alt='photo de profil'>
                    </div>
                <div class='name_msg'>
                    <span><p><b>". GetUserName($nickname) ."</b><i class='fa-solid fa-badge-check'></i>@$nickname<small>$date</small></p></span>
                <div class='msg'>
                    <p>$content</p>
                </div>
                </div>
                </div>
                <div class='image_video'>
                <img src=$mediaPath alt=''>
                </div>
                    <div class='your_reaction'>
                        <div class='comment'><i class='fa-solid fa-comment'></i><p>0</p></div>
                        <div class='retweet'><i class='fa-solid fa-retweet'></i><p>0</p></div>
                        <div class='like'><i class='fa-solid fa-heart'></i><p>$likeCount</p></div>
                        <div class='bookmark'><i class='fa-solid fa-bookmark'></i><p>0</p></div>
                    </div>
                </div>";
            }
        }
    }
    return $post;
}

function GetUserId($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            echo Console('id utilisateur trouvé pour '. $nickname . ' : ' . $ligne['id']);
            return $ligne['id'];
        }
    }
    return null;
}

function GetUserPdpPath($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            echo Console('id utilisateur trouvé pour '. $nickname . ' : ' . $ligne['id']);
            return $ligne['pdpPath'];
        }
    }
    return null;
}

function GetUserBanPath($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            echo Console('id utilisateur trouvé pour '. $nickname . ' : ' . $ligne['id']);
            return $ligne['banPath'];
        }
    }
    return null;
}

function GetUserDesc($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            echo Console('id utilisateur trouvé pour '. $nickname . ' : ' . $ligne['id']);
            return $ligne['desc'];
        }
    }
    return null;
}

function GetUserName($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            echo Console('id utilisateur trouvé pour '. $nickname . ' : ' . $ligne['id']);
            return $ligne['Nom'];
        }
    }
    return null;
}

function Console($data) 
{
    $start = array("'", "<p>", "</p>");
    $end   = array(" ", "", "");
    $new = str_replace($start, $end, $data);
    return "<script> console.log('$new'); </script>";
}
?>