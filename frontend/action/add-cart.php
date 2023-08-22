<?php
session_start();
include("database.php");
// include("functions.php");
// $ip_address = getRealUserIp();


$query = $bdd->query("SELECT c.cart_id as cid, c.product_id, c.product_quantity, p.product_id as pid, p.product_title, p.name_url, p.product_price 
FROM cart2 c, product p 
WHERE c.product_id = p.product_id ORDER BY c.cart_id DESC ");

?>