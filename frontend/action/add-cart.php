<?php
session_start();
include("database.php");

$customer_id = $_SESSION['customer_id'];

$query = $bdd->query("SELECT c.cart_id as cid, c.product_id, c.product_quantity, p.product_id as pid, p.product_title, p.name_url, p.product_price 
FROM cart c, product p 
WHERE c.product_id = p.product_id AND c.customer_id = '$customer_id' ORDER BY c.cart_id DESC ");

?>