<?php
include("action/database.php");
include("functions.php");
$ip_address = getRealUserIp();
// if(isset($_POST['hiddenId'])){
//     $id = $_POST['hiddenId'];
//     $quantity = $_POST['quantity'];
//     $selectItem = $bdd->query("UPDATE cart2 set product_quantity = '$quantity' WHERE ip_address='$ip_address' and product_id='$id' "); 
// }

$quantity = $_POST['quantity'];
$id = $_POST['id'];

$selectItem = $bdd->query("DELETE FROM cart2 WHERE cart_id='$id' AND ip_address='$ip_address'");
if($selectItem == TRUE){
    echo "Produit supprimé";
}

?>