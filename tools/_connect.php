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
    $dbname="db_twotter"; //nom de la base de donn�es
    $connexion = mysqli_connect($hostname, $username, $password, $dbname);


    if($mdp != $cmdp)
    {
        return "Les mots de passe sont différents";
    }
    if(!passwd($mdp))
    {
        return "Le mot de passe ne respecte pas les normes.";
    }
    // Voir comment créer une table.
    $requete = "INSERT INTO `twotter` (`pseudo`, `mdp`) VALUES ('$pseudo', '$mdp')"; //La requere SQL
    $resultat = mysqli_query($connexion, $requete); //Executer la requete;
    if ( $resultat == FALSE ){
        return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        die();
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
    $dbname="db_twotter"; //nom de la base de donn�es
    $connexion = mysqli_connect($hostname, $username, $password, $dbname);

    
    $requete = "SELECT * FROM $pseudo";
    $resultat = mysqli_query($connexion, $requete);

    if ( $resultat == NULL){
        return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        die();
    }


    
    else{
        return (boolean)true;
    }
}

?>