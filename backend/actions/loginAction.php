<?php
session_start();
include ('actions/database.php');

if(isset($_POST['validate']))
{
    if(!empty($_POST['user_email']) && !empty($_POST['user_password']))
    {
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];

        $getInfosOfThisUsers = $bdd->prepare('SELECT * FROM users WHERE user_email=? && user_password=?');
        $getInfosOfThisUsers->execute(array($email, $password));
        $data = $getInfosOfThisUsers->fetch();
        $row = $getInfosOfThisUsers->rowCount();

        if($row > 0 )
        {
            $_SESSION["auth"] = true;
            $_SESSION["user_id"] = $data["user_id"];
            $_SESSION["user_email"] = $data["user_email"];
            header('Location:acceuil.php');


        }else{$message="user does not exist";}
    }else{$message="Please complete all required fields";}
    
}























?>