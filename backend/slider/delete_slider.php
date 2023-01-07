<?php
session_start();
require('../actions/database.php');

$id = $_GET['slider_id'];
         
$updateUsers = $bdd->prepare('UPDATE slider SET active = 0 WHERE slider_id=?');        
$updateUsers->execute(array($id));
header('Location:../listSlider.php');
        
?>