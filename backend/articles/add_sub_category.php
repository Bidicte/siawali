<?php
include('actions/database.php');

$id = $_GET['category_id'];

if(isset($_POST['addCategory']) && !empty($_POST['category_name']))
{   
    $name = htmlspecialchars($_POST['category_name']);
    
    $addCategory = $bdd->prepare("INSERT INTO subcategory(subcategory_name, active, category_id) VALUES(?,true,?)");
    $addCategory->execute(array($name, $id));

    $message ="La sous-catégorie a été ajoutée avec success";    
}else{
}
?>