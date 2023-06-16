<?php
include("action/database.php");
include("inclusion/header.php");

$id = $_GET["category_id"];
$getInfosOfThisUser = $bdd->prepare("SELECT * FROM product WHERE active=1 and category_name=?");
$getInfosOfThisUser->execute(array($id));
while($data = $getInfosOfThisUser->fetch()):

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
            <!-- features products -->
            <div class="features">
                <div class="container">
                    <div class="wrapper">
                        <div class="column">
                            <div class="sectop flexitem">
                                <?php
                                    $getCategoryName = $bdd->prepare("SELECT * FROM category WHERE active=1 and category_id=?");
                                    $getCategoryName->execute(array($id));
                                    while($cat = $getCategoryName->fetch()):
                                ?>
                                <h2><span class="circle"></span>Catégorie : <?= $cat['category_name'];?></h2>
                                <?php endwhile;?>
                            </div>
                            <form action="" class="product" method="post">
                                <div class="products main flexwrap">
                                    
                                    <div class="item product-data">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="product-detail.php?product_id=<?= $data['product_id'];?>">
                                                    <img src="<?= "../backend/imagesProducts/" .$data['name_url'];?>" alt="">
                                                </a>
                                            </div>
                                            <div class="footer">
                                                <div class="thirty-button">
                                                    <a href="product-detail.php?product_id=<?= $data['product_id'];?>">Ajouter au panier</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3 class="main-links"><a href="#">
                                                    <?= $data['product_title'];?>
                                                </a>
                                            </h3>
                                            <div class="price">
                                                <span class="current"><?= $data['product_price'];?>.000Fcfa</span>
                                                <span class="normal mini-text">
                                                    <!-- 70.000 XAF -->
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile;?>
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
                                <div class="row">
                                    <div class="item">
                                        <div class="thumbnail object-cover">
                                            <img src="images/products/set1.jpg" alt="">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>Déstockage</h4>
                                            <h3><span>Jusqu'à</span><br>-70%</h3>
                                            <a href="#" class="primary-button">Shoppez maintenant</a>
                                        </div>
                                        <a href="#" class="over-link"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item get-gray">
                                        <div class="thumbnail object-cover">
                                            <img src="images/products/set3.jpg" alt="" width="300" height="200">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>A partir de 5.000 XAF</h4>
                                            <h3><span>Zone des</span><br>Promos</h3>
                                            <a href="#" class="primary-button">Voir plus</a>
                                        </div>
                                        <a href="#" class="over-link"></a>
                                    </div>
                                </div>
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
                            if(isset($_POST['subscribe']))
                            {
                                $userEmail = $_POST['email'];
                                if(filter_var($userEmail, FILTER_VALIDATE_EMAIL))
                                {
                                   $subject = "Merci d'avoir souscrit à la newsletter";
                                   $message = "Vous recevrez nos dernières mise en jour";
                                   $sender = "From: amvetos@gmail.com";//This email is that email wich I have put while configuring xampp
                                   if(mail($userEmail, $subject, $message, $sender))
                                   {
                                        if(isset($_POST['subscribe']) && !empty($_POST['email']))
                                        {
                                            $email = htmlspecialchars($_POST['email']);
                                            $selectUserSignedIn = $bdd->prepare("SELECT * FROM newsletter WHERE newsletter_email=?");
                                            $selectUserSignedIn->execute(array($email));
        
                                            if($selectUserSignedIn->rowCount() == 0){
                                                $userNewsletter = $bdd->prepare("INSERT INTO newsletter(newsletter_email,newsletter_date) VALUES(?,NOW())");
                                                $userNewsletter->execute(array($email));
                                                ?>
                                                <div class="alert">Merci d'avoir souscrit à la newsletter</div>
                                                <?php
                                            }else{
                                                echo $message = "Cette adresse électronique est déjà inscrite. Veuillez réessayer plus tard.";
                                            }
                                            
                                        }
                                    ?>
                                       <!-- Show a success message if mail sent successfully -->
                                    <?php
                                        $userEmail = "";
                                   }
                                   else 
                                   {
                                    ?>
                                        <!-- Show an error message if somehow mail can't be sent-->
                                        <div class="alert">Erreur </div>
                                        <?php
                                   }
                                }
                                else{
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

            <?php include("inclusion/footer-info.php");?>
            <!-- End Footer infos -->

            <?php include("inclusion/footer.php");?>

    <?php include("inclusion/script.php");?>