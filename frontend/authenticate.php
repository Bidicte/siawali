<?php
if(!isset($_SESSION['auth'])){
    $_SESSION['message'] = "Connectez-vous pour continuer";
    echo $_SESSION['message'];
    header('Location:login.php');
}
?>