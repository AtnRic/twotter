<?php 
/*connection à la base de données*/
function connect()
{
    $hostname="localhost";//à changer
    $username="root";//nom d'utilisateur pour acc�der au serveur (root)
    $password="root"; //mot de passe pour acc�der au serveur (root)
    $dbname="twotter"; //nom de la base de donn�es
    
    $connexion = mysqli_connect($hostname, $username, $password, $dbname);

    if (!$connexion) {
        echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
        return false;
    }
    else
    {
        return $connexion;
    }
}

//vérification d'un certain pattern de mdp
function passwd($mdp): bool
{
    $majuscule = preg_match('@[A-Z]@', $mdp);
    $minuscule = preg_match('@[a-z]@', $mdp);
    $chiffre = preg_match('@\d@', $mdp);

    if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8){
        return false;
    }
    else{
        return true;
    }
}

//vérifier que les mots de passe (inscription) sont identiques :
function verifpasswd($mdp, $verif): bool
{
        if($verif==$mdp){
            return true;
        }
        else{
            return false;
        }
}


function signup($pseudo): bool
{
    $connexion = connect();

    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);

    if ( $resultat == NULL){
       echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
       return false;
    }

    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        if($nickname == $pseudo){
            return false;
        }
    }
    $mdp_hash = hash('sha256', $_POST['mdpin']);//on fait un hash du mot de passe pour ne pas stocker le mot de passe en clair
    $requete2 = "INSERT INTO `users` (`nickname`, `password`) VALUES ('$pseudo', '$mdp_hash')"; //La requete SQL
    $resultat2 = mysqli_query($connexion, $requete2); //Executer la requete
    if (!$resultat2){
        echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
        return false;
    }
    else{
        return true;
    }
}


function signin($pseudo): bool
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    if ( $resultat == NULL){
        return false;
    }
    $mdp_hash = hash('sha256', $_POST['mdpco']);//on fait un hash du mot de passe pour ne pas stocker le mot de passe en clair


    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        $password = $ligne['password'];
        if($nickname == $pseudo){
            if($password == $mdp_hash){
                return true;
            }
            else{
                return false;
            }
        }
    }
    return false;
}

/*afficher le logo enregistré en bleu si twoot enregistré*/
function GetBookHTML($nickname, $postId)
{
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
            return "<div class='bookmark'><a href='../tools/_bookmark.php/?postId=$postId'><i class='fa-solid fa-bookmark' style='color: #119afb'></i></a><p></p></div>";
        }
    }
    return "<div class='bookmark'><a href='../tools/_bookmark.php/?postId=$postId'><i class='fa-solid fa-bookmark'></i></a><p></p></div>";
}



/*récupère et affiche les twoots (le plus récent en premier)*/
function getTwoots()
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
                            ". GetBookHTML($nickname, $postId) ."<!--le logo 'enregistrer'-->                
                        </div>
                    </div>";

            }
        }
    }
    return $post;
}



/*récupérer et afficher les twoots d'un seul utilisateur (en paramètre), le twoot le plus récent est affiché en premier*/
function getUserTwoots($User)
{
    $connexion = connect();
    $requete = "SELECT * FROM `twoots`";
    $resultat = mysqli_query($connexion, $requete);
    $post = "";

    $requete_limite = 'SELECT MAX(postId) AS Maximum FROM twoots';
    $resultat_limite = mysqli_query($connexion, $requete_limite);

    if (!$resultat_limite){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }
    $limite = mysqli_fetch_assoc($resultat_limite);
    $limite = (int)$limite['Maximum'];
    if ($resultat == NULL){
        return false;
    }

    for($i = $limite; $i >= 1; $i--) {
        $requete = "SELECT * FROM twoots  WHERE postId = '$i'";
        $resultat = mysqli_query($connexion, $requete);
        if ($resultat) {
            $ligne = $resultat->fetch_assoc();
            $postId = $ligne['postId'];
            $userId = $ligne['userId'] . ' ';
            $content = $ligne['content'];
            $date = $ligne['date'];
            $mediaPath = $ligne['mediaPath'];

            if($userId == GetUserId($User)) {
                $requete2 = "SELECT * FROM `users`";
                $resultat2 = mysqli_query($connexion, $requete2);
                if ($resultat2 == NULL) {
                    return "<p>Erreur d'exécution de la requete : " . mysqli_error($connexion) . "</p>";
                }
                while ($ligne2 = $resultat2->fetch_assoc()) {
                    if ($ligne2['id'] == $userId) {
                        $nickname = $ligne2['nickname'];
                        $post .= "<div class='other_tweet'>
                <div class='profil_msg'>
                    <div class='other_profile'>
                <!--photo profil-->
                        <img src=" . GetUserPdpPath($nickname) . " alt='photo de profil'>
                    </div>
                <div class='name_msg'>
                    <span><p><b><a href='../pages/other_profil.php?pseudo=$nickname'><b>" . GetUserName($nickname) . "</b></a></b><i class='fa-solid fa-badge-check'></i>@$nickname <small>$date</small></p></span>
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
                     ". GetBookHTML($nickname, $postId) ."
                    </div>
                </div>";
                    }
                }
            }
        }
    }
    return $post;
}

/*récupère et affiche le twoot dont l'id est passé en paramètre (pour la page bookmark)*/
function getIdTwoots($rPostId)
{
    $connexion = connect();
    $requete = "SELECT * FROM `twoots`";
    $resultat = mysqli_query($connexion, $requete);
    $post = "";



    if ($resultat == NULL){
        return false;
    }

    $requete = "SELECT * FROM twoots  WHERE postId = '{$rPostId}'";
    $resultat = mysqli_query($connexion, $requete);

    if ($resultat) {
        $ligne = $resultat->fetch_assoc();

        $postId = $ligne['postId'];
        $userId = $ligne['userId'] . ' ';
        $content = $ligne['content'];
        $date = $ligne['date'];
        $mediaPath = $ligne['mediaPath'];

        if($postId == $rPostId) {
            $requete2 = "SELECT * FROM `users`";
            $resultat2 = mysqli_query($connexion, $requete2);
            if ($resultat2 == NULL) {
                return "<p>Erreur d'exécution de la requete : " . mysqli_error($connexion) . "</p>";
            }
            while ($ligne2 = $resultat2->fetch_assoc()) {
                if ($ligne2['id'] == $userId) {
                    $nickname = $ligne2['nickname'];
                    $post .= "<div class='other_tweet'>
                <div class='profil_msg'>
                    <div class='other_profile'>
                <!--photo profil-->
                        <img src=" . GetUserPdpPath($nickname) . " alt='photo de profil'>
                    </div>
                <div class='name_msg'>
                    <span><p><b><a href='../pages/other_profil.php?pseudo=$nickname'><b>" .GetUserName($nickname)." </b></a></b><i class='fa-solid fa-badge-check'></i>@$nickname <small>$date</small></p></span>
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
                    <div class='like'><i class='fa-solid fa-heart'></i></a><p>". random_int(0, 100) ."</p></div>"
                        . GetBookHTML($nickname, $postId) .
                        "
                    </div>
                </div>";
                }
            }
        }
    }
    return $post;
}

//récupère l'id de l'utilisateur à partir de son pseudo
function GetUserId($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            return $ligne['id'];
        }
    }
    return null;
}

//récupère le chemin vers la photo de profil de l'utilisateur dont le pseudo est passé en paramètre
function GetUserPdpPath($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            if($ligne['pdpPath']==NULL){
                return "../images/pp/bat.png"; //photo de profil par défaut
            }
            else{
                return $ligne['pdpPath'];
            }

        }
    }

    return NULL;

}
//récupère le chemin vers la bannière de l'utilisateur dont le pseudo est passé en paramètre
function GetUserBanPath($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {
            if($ligne['banPath']==NULL){
                return "../images/ban/banner.png"; //bannière par défaut
            }
            else{
                return $ligne['banPath'];//le chemin vers la bannière
            }
        }
    }
    return NULL;
}

//récupère la description de l'utilisateur dont le pseudo est passé en paramètre
function GetUserDesc($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            return $ligne['desc'];
        }
    }
    return null;
}

//récupère le nom de l'utilisateur avec le pseudo passé en paramètre
function GetUserName($nickname)
{
    $connexion = connect();
    $requete = "SELECT * FROM `users`";
    $resultat = mysqli_query($connexion, $requete);
    while ($ligne = $resultat -> fetch_assoc()) 
    {
        if($ligne['nickname'] == $nickname)
        {    
            return $ligne['Nom'];
        }
    }
    return null;
}

//permet d'afficher des infos dans la console (debug)
function Console($data): string
{
    $start = array("'", "<p>", "</p>");
    $end   = array(" ", "", "");
    $new = str_replace($start, $end, $data);
    return "<script> console.log('$new'); </script>";
}