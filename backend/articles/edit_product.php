<?php
session_start();
include('actions/database.php');

$id = $_GET['product_id'];
$req = $bdd->prepare('SELECT * FROM product WHERE product_id=?');
$req->execute(array($id));
$data = $req->fetch();

if(isset($_POST['updateProduct']))
{
    if(isset(($_POST['title'])) && isset($_POST['caracterisque']) && isset($_POST['description']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['color']) && isset($_POST['size']))
    {
        $new_title = htmlspecialchars($_POST['title']);
        $new_characteristic = htmlspecialchars($_POST['caracterisque']);
        $new_description = htmlspecialchars($_POST['description']);
        $new_quantity = htmlspecialchars($_POST['quantity']);
        $new_price = htmlspecialchars($_POST['price']);
        $new_color = htmlspecialchars($_POST['color']);
        $new_size = htmlspecialchars($_POST['size']);

        $update_product = $bdd->prepare('UPDATE product SET product_title=?, product_characteristic=?, product_description=?, product_quantity=?, product_price=?, product_color=?, product_size =? WHERE product_id=?');
        $update_product->execute(array($new_title, $new_characteristic, $new_description, $new_quantity, $new_price, $new_color, $new_size, $id));
        
        header('Location:edit_prod.php');
    }
    
}

?>