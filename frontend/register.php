<?php
session_start();
include("action/database.php");
include("inclusion/header.php");

if(isset($_POST["addCustomer"])){
    if(!empty($_POST["lname"]) && !empty($_POST["fname"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
        $lastname = htmlspecialchars($_POST["fname"]);
        $firstname = htmlspecialchars($_POST["lname"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
    $checkIfCustomerAreRegistered = $bdd->prepare("SELECT * FROM customer WHERE customer_email=?");
    $checkIfCustomerAreRegistered->execute(array($email));

    if($checkIfCustomerAreRegistered->rowCount() == 0){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $insertCustomer = $bdd->prepare("INSERT INTO customer(customer_lastname, customer_firstname, customer_email, customer_password, active) VALUES(?,?,?,?,true)");
            $insertCustomer->execute(array($lastname, $firstname, $email, $password));

            $getInfosOfthisCustomer = $bdd->prepare("SELECT customer_id, customer_email FROM customer WHERE customer_email=?");
            $getInfosOfthisCustomer->execute(array($email));

            $datas = $getInfosOfthisCustomer->fetch();

            $_SESSION["auth"] = TRUE;
            $_SESSION["customer_id"] = $datas['customer_id'];
            $_SESSION["customer_email"] = $datas['customer_email'];
            $_SESSION["message"] = "Inscription réussie";
        }
    }else{
        $_SESSION["message"] = "Ce client existe déja";
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
                                <h1>Inscription</h1>
                                <form action="" method="POST">
                                <h1>
                                    <p>
                                        <label for="lname">Nom<span></span></label>
                                        <input type="lname" name="lname" id="lname" required>
                                    </p>
                                </h1>
                                <h1>
                                    <p>
                                        <label for="fname">Prénom<span></span></label>
                                        <input type="fname" name="fname" id="fname" required>
                                    </p>
                                </h1>
                                <h1>
                                    <p>
                                        <label for="email">Adresse E-mail<span></span></label>
                                        <input type="email" name="email" id="email" required autocomplete="off">
                                    </p>
                                </h1>
                                <h1>
                                    <p>
                                        <label for="password">Mot de passe<span></span></label>
                                        <input type="password" name="password" id="password" required autocomplete="off">
                                    </p>
                                </h1>

                                <div class="primary-checkout">
                                    <button type="submit" name="addCustomer" class="primary-button">S'inscrire</button>
                                </div>
                                </form>

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