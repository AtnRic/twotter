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

        //return dans popup ?
        //else echo "fichier trop lourd";
    }

    if(!isset($_POST['twoot']) || !isset($_COOKIE['login']))
    {
        return (boolean)false;
    }
    else
    {
        $start = array("'", "<p>", "</p>");
        $end   = array("\'", "", "");
        $content = str_replace($start, $end, $_POST['twoot']);

        $userId = GetUserId($_COOKIE['login']);
        if($userId == null){
            echo Console("Merde");
        }
        $date = date("m.d.y");   

        $hostname="localhost";//à changer
        $username="root";//nom d'utilisateur pour acc�der au serveur (root)
        $password="root"; //mot de passe pour acc�der au serveur (root)
        $dbname="twotter"; //nom de la base de donn�es
        $connexion = mysqli_connect($hostname, $username, $password, $dbname);
        //$requete = "INSERT INTO `twoots` (`parentId`, `content`, `date`, `likeCount`, `mediaPath`) VALUES ('0', $content, $date, '0', '$File')";
        $requete = "INSERT INTO `twoots` (`userId`, `postId`, `parentId`, `content`, `date`, `likeCount`, `mediaPath`) VALUES ('$userId', '0', '0', '$content', '$date', '0', '$File')";
        $resultat = mysqli_query($connexion, $requete);    
        echo Console(mysqli_error($connexion));
        if ($resultat == NULL)
        {
            echo Console(mysqli_error($connexion));
            return (boolean)false;
        }
    }
    header('Location: ../pages/twotter.php');

//else echo "extension non valide";
?>


<!-- Script php d'affichage des images -->
<?php
/*
if($handle = opendir("images/")){
    $folder = scandir("./images", 1);//1 car on part du dossier actuel -> on va du dossier enfant au dossier parent
    for($i = 0; $i < count($folder) - 2; $i++) {//on va jusqu'à folder-2 car dossier actuel + dossier parent
        echo"<img src='images/$folder[$i]'>";
    }
    closedir($handle);
}*/
?>