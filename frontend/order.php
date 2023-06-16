<?php
include("action/add-cart.php");
include("authenticate.php");
include("inclusion/header.php");


?>

<body>
    <div id="page" class="site page-single">

        <!-- Start Header -->
        <?php include("inclusion/aside.php"); ?>
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
        <br> <br>
        <h1 style="margin-left:20px">Commande validée avec success</h1> <br> <br>

        <?php include("inclusion/footer-info.php"); ?>
        <!-- End Footer infos -->
        <?php include("inclusion/footer.php"); ?>





        <?php include("inclusion/script.php"); ?>