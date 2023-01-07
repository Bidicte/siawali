<?php
session_start();
require('database.php');

$id = $_GET['user_id'];
$getUsersDatas = $bdd->prepare('SELECT * FROM users WHERE user_id=?');
$getUsersDatas->execute(array($id));
$datas = $getUsersDatas->fetch();

if(isset($_POST['updateUser'])){
    if(isset($_POST['update_lastname']) && isset($_POST['update_firstname']) && isset($_POST['update_phone']) && isset($_POST['update_email']) && isset($_POST['update_address']) && isset($_POST['update_login']))
    {
        
        $new_lastname = htmlspecialchars($_POST['update_lastname']);
        $new_firstname = htmlspecialchars($_POST['update_firstname']);
        $new_phone = htmlspecialchars($_POST['update_phone']);
        $new_email = htmlspecialchars($_POST['update_email']);
        $new_address = htmlspecialchars($_POST['update_address']);
        $new_login = htmlspecialchars($_POST['update_login']);

            
        $updateUsers = $bdd->prepare('UPDATE users SET user_lastname=?, user_firstname=?, user_phone = ?, user_email = ?, user_address = ?, user_login = ? WHERE user_id = ?');        
        $updateUsers->execute(array($new_lastname, $new_firstname, $new_phone, $new_email, $new_address, $new_login, $id));
        
        header('Location: updateUsers.php');
        
    }
}




?>
