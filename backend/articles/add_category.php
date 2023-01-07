<?php
include('actions/database.php');

if(isset($_POST['addCategory']) && !empty($_POST['category_name']))
{
    $category_name = htmlspecialchars($_POST['category_name']);
    
    $addCategory = $bdd->prepare("INSERT INTO category(category_name,active) VALUES(?,true)");
    $addCategory->execute(array($category_name));

    $_SESSION['auth'] = true;
    $_SESSION['message'] = "La catégorie a été ajoutée avec success";

}else{
}
?>