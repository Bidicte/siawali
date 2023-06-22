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
        <main>

            <div class="single-cart">
                <div class="container">
                    <div class="wrapper">
                        <div class="breadcrumb">
                            <ul class="flexitem">
                                <li><a href="index.php">Acceuil</a></li>
                                <li>Panier</li>
                            </ul>
                        </div>
                        <div class="page-title">
                            <h1>Panier</h1>
                            <button class="primary-button echap"><a href="index.php">Retour</a></button>
                        </div>


                        <div class="products one cart">
                            <div class="flexwrap">
                                <form action="" class="" id="myCart">
                                    <div class="item left">
                                        <table class="cart-table" id="cart-table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Prix Unitaire</th>
                                                    <th>Quantité</th>
                                                    <th>Sous-total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="cart-items">
                                                <?php
                                                $total = 0;
                                                $subtotal = 0;
                                                $items = $query->fetchAll();
                                                $count = $query->rowcount();
                                                foreach ($items as $item) {
                                                ?>
                                                    <tr class="cart-row">
                                                        <td class="flexitem">
                                                            <div class="thumbnail object-cover">
                                                                <a href="#">
                                                                    <img src="<?= "../backend/imagesProducts/" . $item['name_url']; ?>" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <p><?= $item['product_size'] ?></p>
                                                            </div>
                                                        </td>
                                                        <td class="cart-price"><?= $item['product_price'] ?>.000 Fcfa</td>
                                                        <td class="product-data">
                                                            <input type="hidden" class="productId" value="<?= $item['product_id'] ?>">
                                                            <input type="hidden" class="productId" value="<?= $item['product_size'] ?>">
                                                            <input type="hidden" class="productId" value="<?= $item['product_price'] ?>">
                                                            <div class="qty-control flexitem">
                                                                <button class="minus updateQty">-</button>
                                                                <input type="text" class="num" value="<?= $item['product_quantity'] ?>">
                                                                <button class="plus updateQty">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="product-data">
                                                            <div class="updateSubTotal">
                                                                <?php
                                                                echo $subtotal = $item['product_price'] * $item['product_quantity'] . ".000 Fcfa";
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                            <button type="submit" class="deleteItem" value="<?= $item['cid'] ?>">
                                                                <i class="ri-delete-bin-fill"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                                <tr class="cart-total">
                                                    <th>Total</th>
                                                    <td class="cart-total-price">
                                                        <?php
                                                        $selectProduct = $bdd->query("SELECT * FROM cart WHERE ip_address='$ip_address'");
                                                        $total = 0;
                                                        while ($data2 = $selectProduct->fetch()) {
                                                            $subtotal =  (int)$data2['product_quantity'] * (int)$data2['product_price'];
                                                            $total += $subtotal;
                                                        }
                                                        ?>
                                                        <h1><?= $total . ".000Fcfa" ?></h1>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br> <br>
                                        <button type="submit" value="<?= $item['cid'] ?>" class="deleteAll checkout1 secondary-button">Vider le panier</button> <br>
                                        <a class="primary-button" href="checkout.php">Procéder au paiement</a>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <!-- End main -->


        <footer>


            <?php include("inclusion/footer-info.php"); ?>
            <?php include("inclusion/footer.php"); ?>

            <!-- Jquery cdn -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- Alertify js -->
            <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
            <script>
                // increment
                $(document).ready(function() {

                    $('.plus').click(function(e) {
                        e.preventDefault();

                        var quantity = $(this).closest('.product-data').find('.num').val();

                        var value = parseInt(quantity, 10);
                        value = isNaN(value) ? 0 : value;
                        if (value < 10) {

                            value++;
                            $(this).closest('.product-data').find('.num').val(value);
                        }
                    });

                    $('.minus').click(function(e) {
                        e.preventDefault();

                        var quantity = $(this).closest('.product-data').find('.num').val();

                        var value = parseInt(quantity, 10);
                        value = isNaN(value) ? 0 : value;
                        if (value > 1) {

                            value--;
                            $(this).closest('.product-data').find('.num').val(value);
                        }
                    });

                    $(document).on('click', '.updateQty', function() {

                        var quantity = $(this).closest('.product-data').find('.num').val();
                        var product_id = $(this).closest('.product-data').find('.productId').val();

                        $.ajax({
                            method: "POST",
                            url: "handlecart.php",
                            data: {
                                "product_id": product_id,
                                "product_quantity": quantity,
                                "scope": "update"
                            },
                            success: function(response) {
                                // alert(response);
                            }
                        });
                    });

                    $(document).on('click', '.deleteItem', function() {
                        var cart_id = $(this).val();
                        // alert(cart_id);

                        $.ajax({
                            method: "POST",
                            url: "handlecart.php",
                            data: {
                                "cart_id": cart_id,
                                "scope": "delete"
                            },
                            success: function(response) {
                                if (response == 200) {
                                    alertify.success("Le produit est supprimé");
                                    $('#myCart').load(location.href + "#myCart");
                                } else {
                                    alertify.success(response);
                                }
                            }
                        });
                    });

                    $(document).on('click', '.deleteAll', function() {
                        var cart_id = $(this).val();
                        // alert(cart_id);

                        $.ajax({
                            method: "POST",
                            url: "handlecart.php",
                            data: {
                                "cart_id": cart_id,
                                "scope": "deleteAll"
                            },
                            success: function(response) {
                                if (response == 200) {
                                    alertify.success("Les produits ont été supprimé");
                                    $('#myCart').load(location.href + "#myCart");
                                } else {
                                    alertify.success(response);
                                }
                            }
                        });
                    });

                });

                $(document).ready(function() {

                });
            </script>
            <!-- custom css -->
            <script>
                const FtoShow = '.filter';
                const Fpopup = document.querySelector(FtoShow);
                const Ftrigger = document.querySelector('.filter-trigger');

                Ftrigger.addEventListener('click', () => {
                    setTimeout(() => {
                        if (!Fpopup.classList.contains('show')) {
                            Fpopup.classList.add('show')
                        }
                    }, 250)
                })

                // auto close by click outside .filter
                document.addEventListener('click', (e) => {
                    const isClosest = e.target.closest(FtoShow);
                    if (!isClosest && Fpopup.classList.contains('show')) {
                        Fpopup.classList.remove('show')
                    }
                })
            </script>
            <?php include("inclusion/script.php"); ?>