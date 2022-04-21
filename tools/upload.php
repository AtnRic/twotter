<!-- Script php d'enregistrement des images-->
<?php
$File = '../images/media/' .basename($_FILES["file"]["name"]);
$extension = strtolower(pathinfo($File, PATHINFO_EXTENSION));
$valide = array('jpg', 'png', 'gif', 'jpeg');
if (in_array($extension, $valide)){ //vérifie l'extension du fichier
    if(@filesize($File)<=1000000){//vérifie la taille du fichier
        move_uploaded_file($_FILES["file"]["tmp_name"], $File);//on déplace l'image dans le dossier
    }
    //return dans popup ?
    //else echo "fichier trop lourd";
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