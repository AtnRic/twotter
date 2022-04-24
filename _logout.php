  <?php
  include 'tools/_connect.php';
        
        setcookie("login", "", time() - 3600);
        setcookie("mdp_hash", "", time() - 3600);
        unset($_COOKIE['login']); 
        unset($_COOKIE['mdp_hash']);     
    $newURL = "accueil.php";
    header('Location: '.$newURL);
    ?>
