<!-- Script php d'enregistrement des images-->
<?php
    include '_connect.php';
    echo Console($_FILES["fileP"]["name"]);
    $File = '../images/pp/' .basename($_FILES["fileP"]["name"]);
    $extension = strtolower(pathinfo($File, PATHINFO_EXTENSION));
    $valide = array('jpg', 'png', 'gif', 'jpeg', 'webp');
    
    if (in_array($extension, $valide))
    {   
        //vérifie l'extension du fichier
        if(@filesize($File)<=1000000)
        {   //vérifie la taille du fichier
            echo Console("File size cor.");
            move_uploaded_file($_FILES["fileP"]["tmp_name"], $File);//on déplace l'image dans le dossier
        }
        else{
            echo Console("File size inc.");
        }

        $connexion = connect();
        $requete = "SELECT * FROM `users`";
        $resultat = mysqli_query($connexion, $requete);
        if ($resultat == NULL){
            echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
            return (boolean)false;
        }
        while ($ligne = $resultat -> fetch_assoc()) 
        {
            if($ligne['nickname'] == $_COOKIE['login'])
            {    
                $id = $ligne['id'];
                echo Console('id utilisateur trouvé pour '. $_COOKIE['login'] . ' : ' . $ligne['id']);
                $requete2 = "UPDATE `users` SET `pdpPath` = '$File' WHERE `users`.`id` = $id;";
                $resultat = mysqli_query($connexion, $requete2);
                if ($resultat == NULL){
                    echo Console("<p>Erreur d'exécution de la requete : ".mysqli_error($connexion)."</p>");
                    return (boolean)false;
                }
                break;
            }
        }
    }
    $nickname = $_COOKIE['login'];
    header("Location: ../pages/other_profil.php?pseudo=$nickname");
?>