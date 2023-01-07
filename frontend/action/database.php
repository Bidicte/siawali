<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=siawali","root", "");
}catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>