<?php
session_start();
require("action/database.php");


$query = $bdd->query("SELECT c.cart_id as cid, c.product_id, c.product_quantity, c.product_size, p.product_id as pid, p.product_title, p.name_url, p.product_price 
FROM cart c, product p 
WHERE c.product_id = p.product_id ORDER BY c.cart_id DESC ");
