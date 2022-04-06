<?php 

function connect(){
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

function passwordCheck($u) 
{
    if(strlen($u) < 8){
        return (boolean)false;
    }
    $pattern = "/[0-9]{1}/";
    if(!preg_match($pattern, $u)){
        return (boolean)false;
    }
    $Lower = false;
    $Upper = false;
    for($i=0; $i<strlen($u); $i++){
        if(ctype_upper($u[$i])){
            $Upper = true;
        }
        if(ctype_lower($u[$i])){
            $Lower = true;
        }
    }
    if($Lower && $Upper){
        return (boolean)true;
    }
    else{
        return (boolean)false;
    }
    return (boolean)false;
}

function signup($pseudo, $mdp, $cmdp)
{
    if($mdp != $cmdp)
    {
        return "Les mots de passe sont différents";
    }
    if(!passwordCheck($mdp))
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
    //header("Location:TP4.php");//Redirection vers la page TP4.php 
}
				

function signin($pseudo, $mdp)
{
    $requete = "SELECT * FROM $pseudo;
    $resultat = mysqli_query($connexion, $requete);

    if ( $resultat == FALSE ){
        return "<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>" ;
        die();
    }
    else{
        return (boolean)true;
    }
}

?>