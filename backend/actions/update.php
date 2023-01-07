<?php
session_start();
include('database.php');

if(isset($_POST['update']) && !empty($_POST['update']))
{
    $user_id = $_POST['update'];

    $getIdOfThisUsers = $bdd->prepare('SELECT * FROM users WHERE user_id = ? ');
    $getIdOfThisUsers->execute(array($user_id));

    if($getIdOfThisUsers->rowCount() > 0) 
    {
        $data = $getIdOfThisUsers->fetch();
            $firstname = $data['user_firstname'];
            $lastname = $data['user_lastname'];
            $phone = $data['user_phone'];
            $email = $data['user_email'];
            $address = $data['user_address'];
            $login = $data['user_login'];
       

    }else{}

}else{}


?>
