<?php
include("action/database.php");
/// IP address code starts /////
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
/// IP address code Ends /////


// function removeItemCart() {
//     if(isset($_POST['hiddenId'])){
//         $id = $_POST['hiddenId'];
//         $quantity = $_POST['quantity'];
//         $selectItem = $bdd->query("DELETE * FROM cart2 WHERE ip_address='$ip_address' and product_id='$id' "); 
//     }
// }
?>