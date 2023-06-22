<?php
include("action/database.php");
include("inclusion/header.php");

$id = $_GET["product_id"];
$selectProduct = $bdd->query("SELECT * FROM product WHERE active=1 and product_id='$id'");
$data = $selectProduct->fetch();


if (isset($_POST["add_order"]) && !empty($_POST["product_qty"]) && !empty($_POST["product_size"])) {
    $qty = htmlspecialchars($_POST["product_qty"]);
    $size = htmlspecialchars($_POST["product_size"]);
    $price = $data['product_price'];
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $insertOrder = $bdd->prepare("INSERT INTO cart(product_id, product_quantity, product_size, product_price, ip_address, cart_date) VALUES(?,?,?,?,?,NOW())");
    $insertOrder->execute(array($id, $qty, $size, $price, $ip_address));
}

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

            <!-- single page -->
            <div class="single-product">
                <div class="container">
                    <div class="wrapper">
                        <div class="breadcrumb">
                            <ul class="flexitem">
                                <li><a href="index.php">Acceuil</a></li>
                                <li><a href="product-detail.php">Détails</a></li>
                                <li><a href="#"><?= $data['product_title'] ?></a></li>
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
                                                        <a data-fslightbox href="<?= "../backend/imagesProducts/" . $data['name_url']; ?>"><img src="<?= "../backend/imagesProducts/" . $data['name_url']; ?>" alt=""></a>
                                                    </div>
                                                    <div class="image-show swiper-slide">
                                                        <a data-fslightbox href="<?= "../backend/imagesProducts/" . $data['name_url1']; ?>"><img src="<?= "../backend/imagesProducts/" . $data['name_url1']; ?>" alt=""></a>
                                                    </div>
                                                    <div class="image-show swiper-slide">
                                                        <a data-fslightbox href="<?= "../backend/imagesProducts/" . $data['name_url2']; ?>"><img src="<?= "../backend/imagesProducts/" . $data['name_url2']; ?>" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                            <div thumbSlider="" class="small-image">
                                                <ul class="small-image-wrapper flexitem swiper-wrapper">
                                                    <li class="thumbnail-show swiper-slide">
                                                        <img src="<?= "../backend/imagesProducts/" . $data['name_url']; ?>" alt="">
                                                    </li>
                                                    <li class="thumbnail-show swiper-slide">
                                                        <img src="<?= "../backend/imagesProducts/" . $data['name_url1']; ?>" alt="">
                                                    </li>
                                                    <li class="thumbnail-show swiper-slide">
                                                        <img src="<?= "../backend/imagesProducts/" . $data['name_url2']; ?>" alt="">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="item">
                                            <h1><?= $data['product_title'] ?></h1>
                                            <form action="" method="post">
                                                <div class="content">
                                                    <div class="price">
                                                        <span class="current" name="product_price"><?= $data['product_price'] ?>.000Fcfa</span>
                                                    </div>
                                                    <div class="sizes">
                                                        <div class="button-cart">
                                                            <p>Taille</p>
                                                            <select name="product_size" class="form-control">
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
                                                            <p>Quantité</p>
                                                            <select name="product_qty" class="form-control">
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
            <?php include("inclusion/footer-info.php"); ?>
            <!-- End Footer infos -->

            <?php include("inclusion/footer.php"); ?>

            <?php include("inclusion/script.php"); ?>