<?php
session_start();
include('actions/database.php');

$id = $_GET['logo_id'];
$req = $bdd->prepare('SELECT * FROM logo WHERE logo_id=?');
$req->execute(array($id));
$data = $req->fetch();

if(isset($_POST['updateLogo']))
{
    if(isset(($_POST['logo_name'])))
    {
        $new_name = htmlspecialchars($_POST['logo_name']);

        $update_product = $bdd->prepare('UPDATE logo SET logo_name=? WHERE logo_id=?');
        $update_product->execute(array($new_name, $id));
        
        header('Location:listLogo.php');
    }
    
}

?>