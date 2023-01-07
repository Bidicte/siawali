<?php
session_start();
require('../actions/database.php');

$id = $_GET['subcategory_id'];
         
$updateUsers = $bdd->prepare('UPDATE subcategory SET active = 0 WHERE subcategory_id=?');        
$updateUsers->execute(array($id));
header('Location:../deleteSubCategory.php');
?>