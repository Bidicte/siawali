<?php
session_start();
include('actions/database.php');
$id = $_GET['category_id'];
$req = $bdd->prepare('SELECT * FROM category WHERE category_id=?');
$req->execute(array($id));
$data = $req->fetch();


if(isset($_POST['modify_category']) && !empty(($_POST['category_name'])))
{

    $name_change = htmlspecialchars($_POST['category_name']);

    $update_category = $bdd->prepare('UPDATE category SET category_name=? WHERE category_id=?');
    $update_category->execute(array($name_change,$id));

    $message = "Une modification a été effectuée";
    
}

?>