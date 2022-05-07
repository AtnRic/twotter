<!-- Script php d'enregistrement des images-->
<?php
    include '_main_tools.php';
        $login = $_COOKIE['login'];
        $connexion = connect();
        $requete = "SELECT * FROM `users`";
        $resultat = mysqli_query($connexion, $requete);
        if ($resultat == NULL){
            echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
            return false;
        }

    if(isset($_POST['desc']) && !empty($_POST['desc'])){

        echo Console($login);

        $start = array("'", "<p>", "</p>");
        $end   = array("\'", "", "");
        $desc = str_replace($start, $end, $_POST['desc']);
  
                $requete2 = "UPDATE `users` SET `desc` = '$desc' WHERE `users`.`nickname` = '$login'";
                $resultat = mysqli_query($connexion, $requete2);
                if ($resultat == NULL){
                    echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
                    return false;
                }
    }


    if(isset($_POST['nom']) && !empty($_POST['nom']))
    {
        echo Console($login);

        $start = array("'", "<p>", "</p>");
        $end   = array(" ", "", "");
        $nom = str_replace($start, $end, $_POST['nom']);

                $requete2 = "UPDATE `users` SET `Nom` = '$nom' WHERE `users`.`nickname` =  '$login'";
                $resultat = mysqli_query($connexion, $requete2);
                if ($resultat == NULL){
                    echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
                    return false;
                }
    }
    $nickname = $_COOKIE['login'];
    header("Location: ../pages/other_profil.php?pseudo=$nickname");
?>