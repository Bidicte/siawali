<?php 
include('database.php');
$id = $_GET['user_id'];

if(!empty($_POST['pass1']) && !empty($_POST['pass2'])){
        $pass1 = htmlspecialchars($_POST['pass1']);
        $pass2 = htmlspecialchars($_POST['pass2']);

        $check = $bdd->prepare('SELECT * FROM users WHERE user_id = ?');
        $check->execute(array($id));
        $row = $check->rowCount();

        if($row){
            if($pass1 === $pass2){
                $pass1 = password_hash($pass1, PASSWORD_BCRYPT);

                $update = $bdd->prepare('UPDATE users SET user_password = ? WHERE user_id = ?');
                $update->execute(array($pass1, $id));

                $message = "Le mot de passe a bien été modifié";
            }else{
                    $message = "Les mots de passes ne sont pas identiques";
            }
        }
    }else{
            $message = "Merci de renseigner un mot de passe";
}