<?php
include("action/database.php");
include("inclusion/header.php");
$id = $_GET["product_id"];
$selectProduct = $bdd->query("SELECT * FROM product WHERE active=1 and product_id='$id'");
$data = $selectProduct->fetch();
var_dump($_POST);

    if(isset($_POST["add_order"]) && !empty($_POST["product_qty"]) && !empty($_POST["product_size"]) ){
        $qty = htmlspecialchars($_POST["product_qty"]);
        $size = htmlspecialchars($_POST["product_size"]);
        $price = $data['product_price'];
        $ip_address = $_SERVER['REMOTE_ADDR'];

        $insertOrder = $bdd->prepare("INSERT INTO cart2(product_id, product_quantity, product_size, product_price, ip_address, cart_date) VALUES(?,?,?,?,?,NOW())");
        $insertOrder->execute(array($id,$qty,$size,$price, $ip_address));
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

            <!-- single page -->
            <div class="single-product">
                <div class="container">
                    <div class="wrapper">
                        <div class="breadcrumb">
                            <ul class="flexitem">
                                <li><a href="index.php">Acceuil</a></li>
                                <li><a href="product-detail.php">Détails</a></li>
                                <li><a href="#"><?= $data['product_title']?></a></li>
                            </ul>
                        </div>
                        <!-- Breadcrumb -->

                        <div class="column">
                            <div class="products one">
                                <div class="flexwrap">
                                    <div class="row">
                                        <div class="item is_sticky">
                                            <div class="big-image">
                                                <div class="big-image-wrapper swiper-wrapper">
                                                    <div class="image-show swiper-slide">
                                                        <a data-fslightbox href="<?= "../backend/imagesProducts/" .$data['name_url'];?>"><img
                                                                src="<?= "../backend/imagesProducts/" .$data['name_url'];?>" alt=""></a>
                                                    </div>
                                                    <div class="image-show swiper-slide">
                                                        <a data-fslightbox href="<?= "../backend/imagesProducts/" .$data['name_url1'];?>"><img
                                                                src="<?= "../backend/imagesProducts/" .$data['name_url1'];?>" alt=""></a>
                                                    </div>
                                                    <div class="image-show swiper-slide">
                                                        <a data-fslightbox href="<?= "../backend/imagesProducts/" .$data['name_url2'];?>"><img
                                                                src="<?= "../backend/imagesProducts/" .$data['name_url2'];?>" alt=""></a>
                                                    </div>
                                                    <div class="image-show swiper-slide">
                                                        <a data-fslightbox href="<?= "../backend/imagesProducts/" .$data['name_url'];?>"><img
                                                                src="<?= "../backend/imagesProducts/" .$data['name_url'];?>" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                            <div thumbSlider="" class="small-image">
                                                <ul class="small-image-wrapper flexitem swiper-wrapper">
                                                    <li class="thumbnail-show swiper-slide">
                                                        <img src="<?= "../backend/imagesProducts/" .$data['name_url'];?>" alt="">
                                                    </li>
                                                    <li class="thumbnail-show swiper-slide">
                                                        <img src="<?= "../backend/imagesProducts/" .$data['name_url1'];?>" alt="">
                                                    </li>
                                                    <li class="thumbnail-show swiper-slide">
                                                        <img src="<?= "../backend/imagesProducts/" .$data['name_url2'];?>" alt="">
                                                    </li>
                                                    <li class="thumbnail-show swiper-slide">
                                                        <img src="<?= "../backend/imagesProducts/" .$data['name_url'];?>" alt="">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="item">
                                            <h1><?= $data['product_title']?></h1>
                                            <form action="" method="post">
                                            <div class="content">
                                                <div class="price">
                                                    <span class="current" name="product_price"><?= $data['product_price']?>.000Fcfa</span>
                                                </div>
                                                <div class="sizes">
                                                    <p>Taille</p>
                                                    <div class="button-cart">
                                                        <select name="product_size" class="form-control" >
                                                            <option>Selectionner une Taille</option>
                                                            <option>XS</option>
                                                            <option>S</option>
                                                            <option>L</option>
                                                            <option>XL</option>
                                                            <option>2XL</option>
                                                            <option>3XL</option>
                                                            <option>4XL</option>
                                                            <option>5XL</option>
                                                        </select> <br><br>
                                                        <select name="product_qty" class="form-control" >
                                                            <option>Selectionner une quantité</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="button-cart"><button class="primary-button" name="add_order">Ajouter au Panier</button></div>
                                                </div>
                                                <div class="description collapse">
                                                    <ul>
                                                        <li class="has-child expand">
                                                            <a href="#0" class="icon-small">Information sur l'article</a>
                                                            <ul>
                                                                <ul class="content">
                                                                    <li><span>Brands<span>Nike</span></span></li>
                                                                    <li><span>Activité<span>Running</span></span></li>
                                                                </ul>
                                                            </ul>
                                                        </li>
                                                        <li class="has-child">
                                                            <a href="#0" class="icon-small">Détails</a>
                                                            <div class="content">
                                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing
                                                                    elit. Quae cupiditate deleniti, porro fuga et
                                                                    pariatur voluptas animi totam non sint! Eius cumque,
                                                                    praesentium error consequuntur ad voluptatum
                                                                    quisquam sunt placeat!</p>
                                                            </div>
                                                        </li>
                                                        <li class="has-child">
                                                            <a href="#" class="icon-small">Note de l'article</a>
                                                            <div class="content">
                                                                <div class="reviews">
                                                                    <h4>Retours des clients</h4>
                                                                    <div class="review-block">
                                                                        <div class="review-block-head">
                                                                            <div class="flexitem">
                                                                                <span class="rate-sum">4.9</span>
                                                                                <span>56 Retours</span>
                                                                            </div>
                                                                            <a href="#review-form"
                                                                                class="secondary-button">Ecrire son avis</a>
                                                                        </div>
                                                                        <div class="review-block-body">
                                                                            <ul>
                                                                                <li class="item">
                                                                                    <div class="review-form">
                                                                                        <div class="person">Review by
                                                                                            Alexa</div>
                                                                                        <div class="mini-text">le 7/7/22
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="review-rating rating">
                                                                                        <div class="stars"></div>
                                                                                    </div>
                                                                                    <div class="review-title">
                                                                                        <p>Awesome product!</p>
                                                                                    </div>
                                                                                    <div class="review-text">
                                                                                        <p>Lorem ipsum dolor sit amet
                                                                                            consectetur adipisicing
                                                                                            elit. Iste veniam in atque,
                                                                                            cum a eius distinctio
                                                                                            inventore ut provident
                                                                                            maiores.</p>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="second-links">
                                                                                <a href="#" class="view-all">View all
                                                                                    reviews <i
                                                                                        class="ri-arrow-right-line"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div id="review-form" class="review-form">
                                                                            <h4>Ecrire votre avis</h4>
                                                                            <div class="rating">
                                                                                <p>Vous etes satisfait(e) de l'article?</p>
                                                                                <div class="rate-this">
                                                                                    <input type="radio" name="rating"
                                                                                        id="star5">
                                                                                    <label for="star5"><i
                                                                                            class="ri-star-fill"></i></label>

                                                                                    <input type="radio" name="rating"
                                                                                        id="star4">
                                                                                    <label for="star4"><i
                                                                                            class="ri-star-fill"></i></label>

                                                                                    <input type="radio" name="rating"
                                                                                        id="star3">
                                                                                    <label for="star3"><i
                                                                                            class="ri-star-fill"></i></label>

                                                                                    <input type="radio" name="rating"
                                                                                        id="star2">
                                                                                    <label for="star2"><i
                                                                                            class="ri-star-fill"></i></label>

                                                                                    <input type="radio" name="rating"
                                                                                        id="star1">
                                                                                    <label for="star1"><i
                                                                                            class="ri-star-fill"></i></label>
                                                                                </div>
                                                                            </div>
                                                                            <form action="">
                                                                                <p>
                                                                                    <label>Nom</label>
                                                                                    <input type="text">
                                                                                </p>
                                                                                <p>
                                                                                    <label>Résumé</label>
                                                                                    <input type="text">
                                                                                </p>
                                                                                <p>
                                                                                    <label>Avis</label>
                                                                                    <textarea cols="30"
                                                                                        rows="10"></textarea>
                                                                                </p>
                                                                                <p><a href="#"
                                                                                        class="primary-button">Soumettre</a>
                                                                                </p>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
            <!-- End single page -->


        </main>
        <!-- End main -->


        <footer>
        <?php include("inclusion/footer-info.php");?>
            <!-- End Footer infos -->

            <?php include("inclusion/footer.php");?>

    <?php include("inclusion/script.php");?>