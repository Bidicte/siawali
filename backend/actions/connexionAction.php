<?php
session_start();
include ('actions/database.php');
if(isset($_POST['validate']))
{
    if(!empty($_POST['user_email']) && !empty($_POST['user_password']))
    {
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];

        $getInfosOfThisUsers = $bdd->prepare('SELECT * FROM users WHERE user_email=?');
        $getInfosOfThisUsers->execute(array($email));
        $data = $getInfosOfThisUsers->fetch();
        $passwordHash = $data['user_password'];

        if($data['active'] == 1)
        {   
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if($password == $passwordHash)
                {
                    $_SESSION['auth'] = true;
                    $_SESSION['user_id'] = $data['user_id']; 
                    $_SESSION['user_email'] = $data['user_email'];
                    // Redirection vers la page d'acceuil 
                    header('Location:home.php');

                }else{$_SESSION['message']="Mot de passe incorrect";}
            }else{$_SESSION['message']="Email incorrect";}
                
        }else{$_SESSION['message']="Utilisisateur introuvable";}
    }else{$_SESSION['message']="Veuillez remplir tous les champs";}
    
}




















?>