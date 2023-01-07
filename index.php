<?php
include("inclusion/header.php");
?>
<body>
    <div id="page" class="site page-single">

        <aside class="site-off desktop-hide">
            <div class="off-canvas">
                <div class="canvas-head flexitem">
                    <div class="logo"><a href="#"><span class="circle"></span>.Siawali</a></div>
                    <a href="#" class="t-close flexcenter"><i class="ri-close-line"></i></a>
                </div>
                <div class="departments"></div>
                <nav></nav>
                <div class="thetop-nav"></div>
            </div>
        </aside>

        <header>
            <!-- Start header-top -->
            <?php include("inclusion/start-header-top.php"); ?>
            <!-- End Header-top -->

            <!-- Header Content -->
            <div class="header-nav">
                <div class="container">
                    <div class="wrapper flexitem">
                        <a href="#" class="trigger desktop-hide"><span class="i ri-menu-2-line"></span></a>
                        <div class="left flexitem">
                            <div class="logo"><a href="/"><span class="circle"></span>.Siawali</a></div>
                            <nav class="mobile-hide">
                                <ul class="flexitem second-links">
                                    <li><a href="#">Nouveautés</a></li>
                                    <li><a href="#">Chaussures et Accs</a></li>
                                    <li>
                                        <a href="#">Ensemble Tailleur
                                            <div class="fly-item"><span>New!</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="right">
                            <ul class="flexitem second-links">
                                <li class="mobile-hide"><a href="#">
                                        <div class="icon-large"><i class="ri-heart-line"></i></div>
                                        <div class="fly-item"><span class="item-number">0</span></div>
                                    </a>
                                </li>
                                <li><a href="cart.php" class="iscart">
                                        <div class="icon-large">
                                            <i class="ri-shopping-cart-line"></i>
                                            <div class="fly-item"><span class="item-number">

                                                </span></div>
                                        </div>
                                        <div class="icon-text">
                                            <div class="mini-text">Total</div>
                                            <div class="cart-total">0 Fcfa</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Content -->

            <!-- Header main -->
            <div class="header-main mobile-hide">
                <div class="container">
                    <div class="wrapper flexitem">
                        <div class="left">
                            <div class="dpt-cat">
                                <div class="dpt-head">
                                    <div class="main-text">Achetez par catégories</div>
                                    <div class="mini-text mobile-hide">Total: 150 Vetements et Accs</div>
                                    <a href="#" class="dpt-trigger mobile-hide">
                                        <i class="ri-menu-3-line ri-xl"></i>
                                        <i class="ri-close-line ri-xl"></i>
                                    </a>
                                </div>
                                <div class="dpt-menu">
                                    <ul class="second-links">
                                        <li class="has-child beauty">
                                            <a href="#">
                                                Ensemble Tailleur
                                                <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                            <ul>
                                                <li><a href="#">Alexa</a></li>
                                                <li><a href="#">Skin Careeee</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                        <li>
                                            <a href="#">
                                                Combinaison
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="search-box">
                                <form action="" class="search">
                                    <span class="icon-large"><i class="ri-search-line"></i></span>
                                    <input type="search" name="" id="" placeholder="Rechercher un produit">
                                    <button type="submit">Rechercher</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                while($data = $displaySlider->fetch()):
                            ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="image object-cover thumbnail">
                                            <img src="<?= "../backend/imagesSlider/" .$data['name_url'];?>" alt="">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h2 class="br"><span><?= $data['slider_description'] ?></span></h2>
                                            <a href="#" class="primary-button">Achetez maintenant</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile?>
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
                                <div class="second-links">
                                    <a href="#" class="view-all">View All<i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                            <form action="" class="product">
                                <div class="products main flexwrap">

                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="" alt="">
                                                </a>
                                            </div>
                                            <div class="discount circle flexcenter"><span>21%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(34)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">

                                                </a></h3>
                                            <div class="price">
                                                <span class="current">35.000 XAF</span>
                                                <span class="normal mini-text">

                                                </span>
                                            </div>
                                            <div class="primary-button">
                                                <a href="" class="add-cart">J'achète</a>
                                            </div>
                                        </div>
                                    </div>



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
                            <form action="" class="search">
                                <span class="icon-large"><i class="ri-mail-line"></i></span>
                                <input type="mail" placeholder="Entrer Votre Email" required>
                                <button type="submit">S'abonner</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End newsletter -->

            <div class="widgets">
                <div class="container">
                    <div class="wrapper">
                        <div class="flexwrap">
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>Aide & Contact</h4>
                                    <ul class="flexcol">
                                        <li><a href="#">Your account</a></li>
                                        <li><a href="#">Your orders</a></li>
                                        <li><a href="#">Shipping Rates</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Assistant</a></li>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>Categories</h4>
                                    <ul class="flexcol">
                                        <li><a href="#">Robes</a></li>
                                        <li><a href="#">Blazer</a></li>
                                        <li><a href="#">Ensemble Tailleur</a></li>
                                        <li><a href="#">Pantalon</a></li>
                                        <li><a href="#">Tops</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>Moyen de paiement</h4>
                                    <ul class="flexcol">
                                        <li><a href="#">Visa</a></li>
                                        <li><a href="#">Stripe</a></li>
                                        <li><a href="#">Paypal</a></li>
                                        <li><a href="#">Orange Money</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>A propos de nous</h4>
                                    <ul class="flexcol">
                                        <li><a href="#">Information</a></li>
                                        <li><a href="#">Vos commandes</a></li>
                                        <li><a href="#">Remboursement</a></li>
                                        <li><a href="#">Avis des clients</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget -->

            <div class="footer-info">
                <div class="container">
                    <div class="wrapper">
                        <div class="flexcol">
                            <div class="logo">
                                <a href="#"><span class="circle"></span>.Siawali</a>
                            </div>
                            <div class="socials">
                                <ul class="flexitem">
                                    <li><a href="https://www.facebook.com/SiiaWali/²"><i
                                                class="ri-facebook-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    <li><a href="https://wa.me/message/L6Y3MF6NN2CZH1"><i
                                                class="ri-whatsapp-line"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="mini-text">Copyright © .Siawali by MVAlexa</p>
                    </div>
                </div>
            </div>
            <!-- End Footer infos -->

            <div class="menu-bottom desktop-hide">
                <div class="container">
                    <div class="wrapper">
                        <nav>
                            <ul class="flexitem">
                                <li>
                                    <a href="#">
                                        <i class="ri-home-smile-line"></i>
                                        <span>Acheter</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="t-search">
                                        <i class="ri-search-line"></i>
                                        <span>Catégorie</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-t-shirt-2-line"></i>
                                        <span>Nouveau</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="ri-shopping-cart-line"></i>
                                        <span>Panier</span>
                                        <div class="fly-item">
                                            <span class="item-number">0</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ri-user-line"></i>
                                        <span>Moi</span>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End menu bottom -->

            <div class="search-bottom desktop-hide">
                <div class="container">
                    <div class="wrapper">
                        <form action="" class="search">
                            <a href="#" class="t-close search-close flexcenter"><i class="ri-close-line"></i></a>
                            <span class="icon-large"><i class="ri-search-line"></i></span>
                            <input type="search" placeholder="Your email address" required>
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Search bottom -->

            <div class="overlay"></div>
        </footer>
        <!-- footer -->


        <!-- Back to top -->
        <div class="backtotop">
            <a href="#" class="flexcol">
                <i class="ri-arrow-up-line"></i>
                <span>Top</span>
            </a>
        </div>
    </div>

    <!-- swiper link -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,

            pagination: {
                el: '.swiper-pagination',
            },


        });

        function passValue() {
            var name = document.getElementById("test").value;
            localStorage.setItem('textvalue', name);
            return false;
        }

    </script>
    <!-- custom css -->
    <script src="js/script.js"></script>
</body>

</html>