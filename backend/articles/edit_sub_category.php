<?php
session_start();
include('actions/database.php');

$id = $_GET['subcategory_id'];
$req = $bdd->prepare('SELECT * FROM subcategory WHERE subcategory_id=?');
$req->execute(array($id));
$data = $req->fetch();

if(isset($_POST['updateCategory']) && !empty($_POST['subcategory_name']))
{
    $new_name = htmlspecialchars($_POST['subcategory_name']);

    $insertNewName = $bdd->prepare('UPDATE subcategory SET subcategory_name=? WHERE subcategory_id=?');
    $insertNewName->execute(array($new_name, $id));

    $message = "Modification avec success";
}
?>