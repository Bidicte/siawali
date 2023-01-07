<?php
session_start();
require('../actions/database.php');

$id = $_GET['product_id'];
         
$updateUsers = $bdd->prepare('UPDATE product SET active = 0 WHERE product_id=?');        
$updateUsers->execute(array($id));
header('Location:../list_product.php');
        
?>