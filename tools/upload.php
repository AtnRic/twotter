<!-- Script php d'enregistrement des images-->
<?php

    include '_main_tools.php';

    $File = '../images/media/' .basename($_FILES["file"]["name"]);
    $extension = strtolower(pathinfo($File, PATHINFO_EXTENSION));
    $valide = array('jpg', 'png', 'gif', 'jpeg', 'webp');
    if (in_array($extension, $valide))
    {   
        //vérifie l'extension du fichier
        if(@filesize($File)<=1000000)
        {   //vérifie la taille du fichier
            move_uploaded_file($_FILES["file"]["tmp_name"], $File);//on déplace l'image dans le dossier
        }
    }

    if(!isset($_POST['twoot']) || !isset($_COOKIE['login']))
    {
        return false;
    }
    else
    {
        $start = array("'", "<p>", "</p>");
        $end   = array("\'", "", "");
        $content = str_replace($start, $end, $_POST['twoot']);

        $userId = GetUserId($_COOKIE['login']);
        if($userId == null){
            echo Console("erreur");
        }
        $date = date("m.d.y");

        $connexion = connect();
        $requete = "INSERT INTO `twoots` (`userId`, `postId`, `parentId`, `content`, `date`, `likeCount`, `mediaPath`) VALUES ('$userId', '0', '0', '$content', '$date', '0', '$File')";
        $resultat = mysqli_query($connexion, $requete);    
        echo Console(mysqli_error($connexion));
        if ($resultat == NULL)
        {
            echo Console(mysqli_error($connexion));
            return false;
        }
    }
    header('Location: ../pages/twotter.php');
?>