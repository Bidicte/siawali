<?php
include("action/database.php");
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
        <main>
            <!-- Slider -->
            <div class="">
                <div class="container">
                    <div class="wrapper">
                        <div class="myslider swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $displaySlider = $bdd->query("SELECT * FROM slider WHERE active=1");
                                while ($data = $displaySlider->fetch()) :
                                ?>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="image object-cover thumbnail">
                                                <img src="<?= "../backend/imagesSlider/" . $data['name_url']; ?>" alt="">
                                            </div>
                                            <div class="text-content flexcol">
                                                <h2 class="br"><span><?= $data['slider_description'] ?></span></h2>
                                                <a href="#" class="primary-button">Achetez maintenant</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slider -->

            <!-- features products -->
            <div class="features">
                <div class="container">
                    <div class="wrapper">
                        <div class="column">
                            <div class="sectop flexitem">
                                <h2><span class="circle"></span>Les plus vendus</h2>
                            </div>
                            <form action="" class="product" method="post">
                                <div class="products main flexwrap">
                                    <?php
                                    $getInfosOfThisUser = $bdd->query('SELECT * FROM product WHERE active = 1');
                                    while ($data = $getInfosOfThisUser->fetch()) :
                                    ?>
                                        <div class="item product-data">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="product-detail.php?product_id=<?= $data['product_id']; ?>">
                                                        <img src="<?= "../backend/imagesProducts/" . $data['name_url']; ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="footer">
                                                    <div class="">
                                                        <a href="product-detail.php?product_id=<?= $data['product_id']; ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50">
                                                                <path d="M12.0049 2C15.3186 2 18.0049 4.68629 18.0049 8V9H22.0049V11H20.8379L20.0813 20.083C20.0381 20.6013 19.6048 21 19.0847 21H4.92502C4.40493 21 3.97166 20.6013 3.92847 20.083L3.17088 11H2.00488V9H6.00488V8C6.00488 4.68629 8.69117 2 12.0049 2ZM13.0049 13H11.0049V17H13.0049V13ZM9.00488 13H7.00488V17H9.00488V13ZM17.0049 13H15.0049V17H17.0049V13ZM12.0049 4C9.86269 4 8.1138 5.68397 8.00978 7.80036L8.00488 8V9H16.0049V8C16.0049 5.8578 14.3209 4.10892 12.2045 4.0049L12.0049 4Z" fill="rgba(234,137,46,1)"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="main-links"><a href="#">
                                                        <?= $data['product_title']; ?>
                                                    </a>
                                                </h3>
                                                <div class="price">
                                                    <span class="current"><?= $data['product_price']; ?>.000Fcfa</span>
                                                    <span class="normal mini-text">
                                                        <!-- 70.000 XAF -->
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End features products -->

            <!-- banner -->
            <div class="banners">
                <div class="container">
                    <div class="wrapper">
                        <div class="column">
                            <div class="banner flexwrap">
                                <?php
                                $getInfosOfThisUser = $bdd->query('SELECT * FROM product WHERE active = 1 and product_id = 8');
                                while ($data = $getInfosOfThisUser->fetch()) :
                                ?>
                                    <div class="row">
                                        <div class="item">
                                            <div class="thumbnail object-cover">
                                                <img src="<?= "../backend/imagesProducts/" . $data['name_url']; ?>" alt="">

                                            </div>
                                            <div class="text-content flexcol">
                                                <h4>Déstockage</h4>
                                                <h3><span>Jusqu'à</span><br>-70%</h3>
                                                <a href="#" class="primary-button">Shoppez maintenant</a>
                                            </div>
                                            <a href="#" class="over-link"></a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php
                                $getInfosOfThisUser = $bdd->query('SELECT * FROM product WHERE active = 1 and product_id = 3');
                                while ($data = $getInfosOfThisUser->fetch()) :
                                ?>
                                    <div class="row">
                                        <div class="item get-gray">
                                            <div class="thumbnail object-cover">
                                                <img src="<?= "../backend/imagesProducts/" . $data['name_url']; ?>" alt="">
                                            </div>
                                            <div class="text-content flexcol">
                                                <h4>A partir de 5.000 XAF</h4>
                                                <h3><span>Zone des</span><br>Promos</h3>
                                                <a href="#" class="primary-button">Voir plus</a>
                                            </div>
                                            <a href="#" class="over-link"></a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End banner -->
        </main>
        <!-- End main -->


        <footer>
            <!-- Newsletter -->
            <div class="newsletter">
                <div class="container">
                    <div class="wrapper">
                        <div class="box">
                            <div class="content">
                                <h3>Rejoinez notre newsletter</h3>
                                <p>Recevez des mises à jour par email sur la boutique et <strong>nos offres
                                        speciales</strong> </p>
                            </div>
                            <?php
                            $userEmail = ""; //first we leave this field blank
                            if (isset($_POST['subscribe'])) {
                                $userEmail = $_POST['email'];
                                if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                                    $subject = "Merci d'avoir souscrit à la newsletter";
                                    $message = "Vous recevrez nos dernières mise en jour";
                                    $sender = "From: amvetos@gmail.com"; //This email is that email wich I have put while configuring xampp
                                    if (mail($userEmail, $subject, $message, $sender)) {
                                        if (isset($_POST['subscribe']) && !empty($_POST['email'])) {
                                            $email = htmlspecialchars($_POST['email']);
                                            $selectUserSignedIn = $bdd->prepare("SELECT * FROM newsletter WHERE newsletter_email=?");
                                            $selectUserSignedIn->execute(array($email));

                                            if ($selectUserSignedIn->rowCount() == 0) {
                                                $userNewsletter = $bdd->prepare("INSERT INTO newsletter(newsletter_email,newsletter_date) VALUES(?,NOW())");
                                                $userNewsletter->execute(array($email));
                            ?>
                                                <div class="alert">Merci d'avoir souscrit à la newsletter</div>
                                        <?php
                                            } else {
                                                echo $message = "Cette adresse électronique est déjà inscrite. Veuillez réessayer plus tard.";
                                            }
                                        }
                                        ?>
                                        <!-- Show a success message if mail sent successfully -->
                                    <?php
                                        $userEmail = "";
                                    } else {
                                    ?>
                                        <!-- Show an error message if somehow mail can't be sent-->
                                        <div class="alert">Erreur </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert"><?php echo $userEmail; ?> n'est pas une adresse valide</div>
                            <?php
                                }
                            }
                            ?>
                            <form action="" class="search" method="POST">
                                <span class="icon-large"><i class="ri-mail-line"></i></span>
                                <input type="mail" name="email" placeholder="Entrer Votre Email" required>
                                <button type="submit" name="subscribe">S'abonner</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End newsletter -->

            <?php include("inclusion/footer-info.php"); ?>
            <!-- End Footer infos -->

            <?php include("inclusion/footer.php"); ?>

            <?php include("inclusion/script.php"); ?>