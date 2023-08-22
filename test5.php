<?php
session_start();
include("action/database.php");
include("inclusion/header.php");
$id = $_GET["product_id"];
$selectProduct = $bdd->query("SELECT * FROM product WHERE product_id='$id' AND active=1  ");
$data = $selectProduct->fetch();
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
                                <li>Détails de chaque produit</li>
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
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="item">
                                            <h1><?= $data['product_title']?></h1>
                                            <div class="content product-data">
                                                <div class="price">
                                                    <span class="current" name="product_price"><?= $data['product_price']?>.000Fcfa</span>
                                                </div>
                                                <div class="sizes">
                                                    <p>Taille</p>
                                                    <div class="variant">
                                                        <form action="add-taille.php" method="POST">
                                                            <?php
                                                                $selectProduct = $bdd->query("SELECT * FROM taille WHERE taille_id = 1");
                                                                $data1 = $selectProduct->fetch();
                                                            ?>
                                                            <P>
                                                                <input type="radio" name="size" id="size-40" value="<?=$data1['taille1'];?>">
                                                                <label for="size-40"
                                                                    class="circle"><span><?=$data1['taille1'];?></span></label>
                                                            </P>
                                                            <P>
                                                                <input type="radio" name="size" id="size-41" value="<?=$data1['taille2'];?>">
                                                                <label for="size-41"
                                                                    class="circle"><span><?=$data1['taille2'];?></span></label>
                                                            </P>
                                                            <P>
                                                                <input type="radio" name="size" id="size-42" value="<?=$data1['taille3'];?>">
                                                                <label for="size-42"
                                                                    class="circle"><span><?=$data1['taille3'];?></span></label>
                                                            </P>
                                                            <P>
                                                                <input type="radio" name="size" id="size-43" value="<?=$data1['taille4'];?>">
                                                                <label for="size-43"
                                                                    class="circle"><span><?=$data1['taille4'];?></span></label>
                                                            </P>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="actions ">
                                                    <div class="qty-control flexitem">
                                                        <button class="minus circle">-</button>
                                                        <input type="text" value="1" class="num">
                                                        <button class="plus circle">+</button>
                                                    </div>
                                                    <div class="button-cart">
                                                        <form action="" method="POST">
                                                            <!-- <input type="hidden" value="<?=$data1['product_size'];?>"> -->
                                                            <button class="primary-button addToCartBtn" value="<?=$data['product_id'];?>">Ajouter au panier</button>
                                                        </form>
                                                    </div>
                                                    <div class="wish-share">
                                                        <ul class="flexitem second-links">
                                                            <li><a href="#">
                                                                    <span class="icon-large">
                                                                        <i class="ri-heart-line"></i></span>
                                                                    <span>Liste des souhaits</span>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="description collapse">
                                                    <ul>
                                                        <li class="has-child expand">
                                                            <a href="#0" class="icon-small">Information</a>
                                                            <ul>
                                                                <ul class="content">
                                                                    <li><span>Lorem<span>Lorem</span></span></li>
                                                                </ul>
                                                            </ul>
                                                        </li>
                                                        <li class="has-child">
                                                            <a href="#0" class="icon-small">Details</a>
                                                            <div class="content">
                                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing
                                                                    elit. Quae cupiditate deleniti, porro fuga et
                                                                    pariatur voluptas animi totam non sint! Eius cumque,
                                                                    praesentium error consequuntur ad voluptatum
                                                                    quisquam sunt placeat!</p>
                                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Est eos eum sequi cum ducimus doloribus
                                                                    voluptate optio, asperiores rem reiciendis sed
                                                                    dolorum. Eligendi quas animi illum consequuntur,
                                                                    autem recusandae veritatis.
                                                                    Cupiditate eaque vel sequi assumenda et harum
                                                                    aliquid inventore, ipsum sint provident voluptate
                                                                    eum facilis quam nemo maiores exercitationem atque
                                                                    est cumque rem labore velit pariatur quisquam
                                                                    quidem! Consequuntur, possimus!</p>
                                                            </div>
                                                        </li>
                                                    
                                                    </ul>
                                                </div>
                                            </div>
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

         
            <?php include("inclusion/footer-info.php");?>
            <!-- End Footer infos -->

            <?php include("inclusion/footer.php");?>

    <?php include("inclusion/script.php");?>
    <script type="text/javascript">
    // increment and decrement each product
    $(document).ready(function () {

    $('.plus').click(function (e) {
        e.preventDefault();

        var quantity = $(this).closest('.product-data').find('.num').val();

        var value = parseInt(quantity, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {

            value++;
            $(this).closest('.product-data').find('.num').val(value);
        }
    });

    $('.minus').click(function (e) {
        e.preventDefault();

        var quantity = $(this).closest('.product-data').find('.num').val();

        var value = parseInt(quantity, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {

            value--;
            $(this).closest('.product-data').find('.num').val(value);
        }
    });

    $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var quantity = $(this).closest('.product-data').find('.num').val();
        var product_id = $(this).val();
        var product_size = $(this).val();

        $.ajax({
            method: "POST",
            url: "handlecart.php",
            data: {
                "product_id": product_id,
                "product_quantity": quantity,
                "product_size": product_size,
                "scope": "add"
            },
            success: function (response){
                if (response == 201) {
                    alertify.success("Le produit ajouté dans le panier");
                }
                if (response == "existing") {
                    alertify.success("Le produit existe déjà dans le panier");
                }
                else if (response == 401) {
                    alertify.success("Connectez vous pour continuer");
                }
                else if (response == 500) {
                    alertify.success("Il y a une erreur");
                }
            }
        });
    });
    
    });
    </script>
<script src="js/script.js"></script>
