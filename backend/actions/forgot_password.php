<?php
include('database.php');
if(isset($_POST['email']) && !empty($_POST['email']))
{
    $email = htmlspecialchars($_POST['email']);

    $check = $bdd->prepare("SELECT token FROM users WHERE user_email = ?");
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row)
    {
        $token = bin2hex(openssl_random_pseudo_bytes(24));
        $token_user = $data['token'];

        $insert = $bdd->prepare("INSERT INTO password_recover(token_user, token) VALUES(?,?)");
        $insert->execute(array($token_user,$token));

        $link = 'actions/recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);

        echo $message = "<a href='$link'>Lien</a>";
    }
    else {
        echo $message = "compte non existant";
    }
}
?>