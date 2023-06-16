<?php
if(!isset($_SESSION['customer_id'])){
    $_SESSION['message'] = "Connectez-vous pour continuer";
    echo $_SESSION['message'];
    header('Location:login.php');
}

?>