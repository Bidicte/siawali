<?php 
    include('database.php');
        if(!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token'])){
            $password = htmlspecialchars($_POST['password']);
            $password_repeat = htmlspecialchars($_POST['password_repeat']);
            $token = htmlspecialchars($_POST['token']);

            $check = $bdd->prepare('SELECT * FROM users WHERE token = ?');
            $check->execute(array($token));
            $row = $check->rowCount();

            if($row){
                if($password === $password_repeat){
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                    $update = $bdd->prepare('UPDATE users SET user_password = ? WHERE token = ?');
                    $update->execute(array($password, $token));
                    
                    $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                    $delete->execute(array($token));

                    header('Location:index.php');
                    echo $message = "Le mot de passe a bien été modifie";
                }else{
                    echo $message = "Les mots de passes ne sont pas identiques";
                }
            }else{
                echo $message = "Compte non existant";
            }
        }else{
            echo $message = "Merci de renseigner un mot de passe";
        }