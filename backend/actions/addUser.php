<?php
session_start();
include('database.php');

if(isset($_POST['signup'])){
    if(!empty($_POST['user_lastname']) && !empty($_POST['user_firstname']) && !empty($_POST['user_phone']) && !empty($_POST['user_email']) &&!empty($_POST['user_address']) && !empty($_POST['user_login']) &&!empty($_POST['user_password']) && !empty($_FILES['name_url'])){
        $firstname = htmlspecialchars($_POST['user_lastname']);
        $lastname = htmlspecialchars($_POST['user_firstname']);
        $phone = htmlspecialchars($_POST['user_phone']);
        $email = htmlspecialchars($_POST['user_email']);
        $address = htmlspecialchars($_POST['user_address']);
        $login = htmlspecialchars($_POST['user_login']);
        $password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $token = bin2hex(openssl_random_pseudo_bytes(64));

        // Add image
        $file_name = $_FILES['name_url']['name'];
        $file_tmp_name = $_FILES['name_url']['tmp_name'];
        $file_extension = strrchr($file_name, '.');
        $extensions = array(".pdf",".PDF",".jpg",".JPG",".png",".PNG");

        $file_destination = 'images/'.$file_name;

        
        $checkIfUsersAreRegistered = $bdd->prepare('SELECT user_login, user_email, user_password FROM users WHERE user_email=?');
        $checkIfUsersAreRegistered->execute(array($email));
        
        if($checkIfUsersAreRegistered->rowCount() == 0){
                if(preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $phone)){
                    
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                    
                    if(in_array($file_extension, $extensions))
                    {
                        if(move_uploaded_file($file_tmp_name, $file_destination))
                        {

                            $insertUsers = $bdd->prepare('INSERT INTO users(user_lastname, user_firstname, user_phone, user_email, user_address, user_login, user_password, name_url, ip_address,token,active) VALUES(?,?,?,?,?,?,?,?,?,?,true)');
                            $insertUsers->execute(array($firstname, $lastname, $phone, $email, $address, $login, $password, $file_name, $ip_address,$token));
                
                            $getInfosOfthisUsers = $bdd->prepare('SELECT user_id, user_email FROM users where user_email=?');
                            $getInfosOfthisUsers->execute(array($email));
                
                            $datas = $getInfosOfthisUsers->fetch();
                
                            $_SESSION['auth'] = true;
                            // $_SESSION['user_id'] = $datas['user_id'];
                            // $_SESSION['user_email'] = $datas['user_email'];
                            
                            $_SESSION['message'] = "L'utilisateur ajouté avec succès";
                        }
                    }
                }
            }

        }else{$_SESSION['message'] = "L'utilisateur existe déjà";}
    }else{
        $_SESSION['message'] = "Veuillez remplir tous les champs";
        
    }
}





?>



























