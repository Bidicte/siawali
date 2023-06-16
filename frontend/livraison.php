<?php
include("action/database.php");
include("inclusion/header.php");
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
            
        <div class="single-product">
                <div class="container">
                    <div class="wrapper">
                        <div class="breadcrumb">
                            <ul class="flexitem">
                                <li><a href="index.php">Siawali</a></li>
                                <li><a href="product-detail.php">livraison</a></li>
                            </ul>
                        </div>
                        <!-- Breadcrumb -->

                        <div class="column">
                            <div class="products one">
                                <div class="flexwrap">
                                    <div class="row">
                                        <div class="item">
                                            <form action="" method="post">
                                            <div class="content">
                                                <div class="description collapse">
                                                    <ul>
                                                        <li class="has-child expand">
                                                            <a href="#0" class="icon-small">Délais de Livraison</a>
                                                            <div class="content">
                                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing
                                                                    elit. Quae cupiditate deleniti, porro fuga et
                                                                    pariatur voluptas animi totam non sint! Eius cumque,
                                                                    praesentium error consequuntur ad voluptatum
                                                                    quisquam sunt placeat!</p>
                                                            </div>
                                                        </li>

                                                        <li class="has-child ">
                                                            <a href="#0" class="icon-small">Nos partenaires</a>
                                                            <ul>
                                                                <ul class="content">
                                                                    <a href="#"><li><span>Yango Déli</span></li></a>
                                                                    <a href="#"><li><span>Uber</span></li></a>
                                                                    <a href="#"><li><span>Heetch</span></li></a>
                                                                </ul>
                                                            </ul>
                                                        </li>
                                                       
                                                        <li class="has-child">
                                                            <a href="#0" class="icon-small">Articles différés</a>
                                                            <div class="content">
                                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing
                                                                    elit. Quae cupiditate deleniti, porro fuga et
                                                                    pariatur voluptas animi totam non sint! Eius cumque,
                                                                    praesentium error consequuntur ad voluptatum
                                                                    quisquam sunt placeat!</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End main -->


        <footer>

            <?php include("inclusion/footer-info.php");?>
            <!-- End Footer infos -->

            <?php include("inclusion/footer.php");?>

    <?php include("inclusion/script.php");?>