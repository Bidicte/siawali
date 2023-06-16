<?php
session_start();
include("action/database.php");

$monradio = $_POST['size'];

$insertTaille = $bdd->query("INSERT INTO cart(size) VALUES('$monradio')");


?>