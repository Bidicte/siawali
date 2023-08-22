<?php 
session_start();
include("action/database.php"); 
include("inclusion/header.php");


if(isset($_POST['validate']))
{
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $getInfosOfThisUsers = $bdd->prepare('SELECT * FROM customer WHERE customer_email=?');
        $getInfosOfThisUsers->execute(array($email));
        $data = $getInfosOfThisUsers->fetch();
        $passwordHash = $data['customer_password'];

        if($data['active'] == 1)
        {   
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(password_verify($password, $passwordHash))
                {
                    $_SESSION['auth'] = true;
                    $_SESSION['customer_id'] = $data['customer_id']; 
                    $_SESSION['customer_firstname'] = $data['customer_firstname']; 
                    $_SESSION['customer_lastname'] = $data['customer_lastname']; 
                    $_SESSION['customer_email'] = $data['customer_email'];

                    // Redirection vers la page d'acceuil 
                    header('Location:index.php');

                }else{$_SESSION['message'] = "Mot de passe invalide";}
            }else{$_SESSION['message'] = "Email invalide";}
        }else{$_SESSION['message'] = "Client introuvable";}
    }
}

?>
<body>
    <div id="page" class="site page-single">

        <!-- Start Header -->
        <?php include("inclusion/aside.php");?>
        <!-- End Start header -->
        <header>
            <!-- Start header-top -->
            <?php include("inclusion/start-header-top.php"); ?>
            <!-- End Header-top -->

            <!-- Header Content -->
            <?php include("inclusion/header-navbar.php"); ?>
            <!-- End Header Content -->

            <!-- Header main -->
            <?php include("inclusion/header-main.php"); ?>
            <!-- End Header main -->
        </header>
        <!-- End header -->

        <main>
            <!-- Checkout -->
            <div class="single-checkout">
                <div class="container">
                    <div class="wrapper">
                        <div class="checkout">
                            <div class="item left styled">
                                <h1>Connexion</h1>
                                <form action="" method="POST">
                                    <p>
                                        <label for="email">Adresse E-mail<span></span></label>
                                        <input type="email" name="email" id="email" required>
                                    </p>
                                    <p>
                                        <label for="fname">Mot de passe<span></span></label>
                                        <input type="password" name="password" id="password" id="fname" required>
                                    </p>
                                    <div class="primary-checkout">
                                    <button type="submit" name="validate" class="primary-button">Se connecter</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Checkout -->
        </main>
        <!-- End main -->


        <footer>
            <?php include("inclusion/footer-info.php");?>
            <!-- End Footer infos -->

            <?php include("inclusion/footer.php");?>

    <?php include("inclusion/script.php");?>        