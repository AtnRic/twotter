<?php 

function connect(){
    $hostname="localhost";//à changer
    $username="root";//nom d'utilisateur pour acc�der au serveur (root)
    $password="root"; //mot de passe pour acc�der au serveur (root)
    $dbname="db_twotter"; //nom de la base de donn�es
    
    $connexion = mysqli_connect($hostname, $username, $password, $dbname);

    if (!$connexion) {
        return (boolean)false;
        die();
    }
    else
    {
        return (boolean)true;
    }
}

//vérification d'un certain pattern de mdp
function passwd($mdp)
{
    $majuscule = preg_match('@[A-Z]@', $mdp);
    $minuscule = preg_match('@[a-z]@', $mdp);
    $chiffre = preg_match('@[0-9]@', $mdp);
                          
    if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8){
        return (boolean)false;          
    }
    else{
        return (boolean)true;
    }
}



//vérifier que les mots de passe (inscription) sont identiques :
    function verifpasswd($mdp, $verif){
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
        return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        die();
    }

    $find = false;

    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        if($nickname == $pseudo){
             return "Un compte utilise déjà ce pseudonyme.";
        }
    }
    // Voir comment créer une table.
    $requete2 = "INSERT INTO `users` (`nickname`, `password`) VALUES ('$pseudo', '$mdp')"; //La requere SQL
    $resultat2 = mysqli_query($connexion, $requete2); //Executer la requete
    if ( $resultat2 == FALSE ){
        return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
    }
    else{
        return "Compte reçu.";
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
        return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        die();
    }

    $find = false;

    while ($ligne = $resultat -> fetch_assoc()) {
        $nickname = $ligne['nickname']; 
        $password = $ligne['password']; 
        $id = $ligne['id'];
        if($nickname == $pseudo){
            if($password == $mdp){
                $find = true;
                return (boolean)true;
            }
            else{
                return "Mauvais mot de passe pour le compte.";
            }
        }
    }
    return "Aucun compte n'a été trouvé.";
}

function Console($data) {
    $start = array("'", "<p>", "</p>");
    $end   = array(" ", "", "");
    $new = str_replace($start, $end, $data);
    return "<script> console.log('$new'); </script>";
}
?>