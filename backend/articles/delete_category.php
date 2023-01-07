<?php
session_start();
require('../actions/database.php');

$id = $_GET['category_id'];
         
$updateUsers = $bdd->prepare('UPDATE category SET active = 0 WHERE category_id=?');        
$updateUsers->execute(array($id));
header('Location:../list_category.php');
        
?>