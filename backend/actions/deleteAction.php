<?php
session_start();
require('database.php');

$id = $_GET['user_id'];
         
$updateUsers = $bdd->prepare('UPDATE users SET active = 0 WHERE user_id=?');        
$updateUsers->execute(array($id));
header('Location:../deleteUser.php');
        
?>