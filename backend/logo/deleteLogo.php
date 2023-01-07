<?php
session_start();
require('../actions/database.php');

$id = $_GET['logo_id'];
         
$updateUsers = $bdd->prepare('UPDATE logo SET active = 0 WHERE logo_id=?');        
$updateUsers->execute(array($id));
header('Location:../listLogo.php');
        
?>