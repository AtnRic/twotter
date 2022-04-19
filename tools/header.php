<?php
if(!isset($pageName)){
    $pageName ="";//si le nom de la page n'a pas été précisé, on initialise la variable pour éviter une erreur
}
if(!isset($cssPath)){
    $cssPath="";
}
if(!isset($cssPath_light)){
    $cssPath_light="";
}
if(!isset($cssPath_dark)){
    $cssPath_dark="";
}
if(!isset($cssPath2)){
    $cssPath2="";
}
echo "
<head>
    <meta charset='utf-8'/>
    <meta name='description' content='Twotter'>
    <meta name='keywords' content='twotter'>
    <meta name='author' content='Antoine RICHARD, Adrien VERHAEGHE'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>$pageName - Twotter</title>
    <script src='https://kit.fontawesome.com/235593db07.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../css/$cssPath'>
    <link rel='stylesheet' href='../css/$cssPath2'>
    <link rel='icon' type='image/png' href='../images/bat.png'/>
    <!--thème-->";
    if(isset($_COOKIE['theme'])) { //si le cookie theme existe
        $style=$_COOKIE['theme'];
        if($style=="dark"){
            echo "<link rel='stylesheet' href='../css/$cssPath_dark'>";
        }
        else{
            echo "<link rel='stylesheet' href='../css/$cssPath_light'>";
        }
    }
    else{//si le cookie n'existe pas, le thème par défaut est le thème clair
        echo "<link rel='stylesheet' href='../css/twotter-css/twotter-light.css'>";
    }

echo "</head>";