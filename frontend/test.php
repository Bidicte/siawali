<?php
include("action/add-cart.php");
include("inclusion/header.php");


$selectOrder = $bdd->query("SELECT * FROM cart2");
$order = $selectOrder->fetch();

$total = 0;
while ($order = $selectOrder->fetch()) {
    $subtotal =  (int)$order['product_quantity'] * (int)$order['product_price'];
    $total += $subtotal;
}
// The query to update product quantity in table product
if (isset($_POST['order']) && !empty($_POST['product_id']) && !empty($_POST['product_quantity'])) {
    $product_id = htmlspecialchars($_POST['product_id']);
    $product_quantity = htmlspecialchars($_POST['product_quantity']);

    $product_query = $bdd->query("SELECT * FROM product WHERE product_id = (SELECT product_id FROM cart2 LIMIT 1)");
    $product = $product_query->fetch(PDO::FETCH_ASSOC);

    $update_quantity = $bdd->query("UPDATE product SET product_quantity = product_quantity - 1");
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
            <!-- Checkout -->
            <div class="single-checkout">
                <div class="container">
                    <div class="wrapper">
                        <form action="" method="post">
                            <div class="checkout flexwrap">
                                <div class="item left styled">
                                    <h1>Addresse de Livraison</h1>

                                    <p>
                                        <label for="nom">Nom<span></span></label>
                                        <input type="text" name="nom" id="nom">
                                    </p>
                                    <p>
                                        <label for="email">Email<span></span></label>
                                        <input type="email" name="email" id="email">
                                    </p>
                                    <p>
                                        <label for="num">Téléphone<span></span></label>
                                        <input type="text" name="num" id="num">
                                    </p>
                                    <p>
                                        <label for="adresse">Adresse</label>
                                        <textarea id="adresse" name="adresse" rows="5" cols="33"></textarea>
                                    </p>
                                </div>
                                <div class="item right">
                                    <h2>Résumé de la commande</h2>
                                    <div class="summary-order is_sticky">
                                        <div class="summary-totals">
                                            <ul>
                                                <li>
                                                    <span>Remise</span>
                                                    <span>Pas de remise appliquée</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <form action="" method="post">
                                            <ul class="products mini">
                                                <?php
                                                $items = $query->fetchAll();
                                                $count = $query->rowcount();
                                                foreach ($items as $item) {
                                                ?>
                                                    <li class="item">
                                                        <div class="thumbnail object-cover">
                                                            <img src="<?= "../backend/imagesProducts/" . $item['name_url']; ?>" alt="">
                                                        </div>
                                                        <div class="item-content">
                                                            <p><?= $item['product_title'] ?></p>
                                                            <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                                            <input type="hidden" name="product_quantity" value="<?= $item['product_quantity'] ?>">
                                                            <span class="price">
                                                                <span><?= $item['product_price'] . ".000Fcfa" ?></span>
                                                                <span>x <?= $item['product_quantity'] ?></span>
                                                                <input type="hidden" name="quantity" value="<?= $item['product_quantity'] ?>">
                                                            </span>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <span style="margin-right:150px">Prix total: </span>
                                            <strong><?= $total . ".000Fcfa"; ?></strong>
                                            <div class="primary-checkout"> <br> <br>
                                                <button type="submit" class="primary-button order" name="order">Valider ma commande</button>

                                        </form>
                                    </div>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- End Checkout -->
    </main>
    <!-- End main -->

    <?php include("inclusion/footer-info.php"); ?>
    <!-- End Footer infos -->
    <?php include("inclusion/footer.php"); ?>

    <!-- modal -->
    <div id="modal" class="modal">
        <div class="content flexcol">
            <div class="image object-cover">
                <img src="images/products/set.jpg" alt="">
            </div>
            <h2>OBTENEZ LES DERNIÈRES OFFRES ET COUPONS</h2>
            <p class="mobile-hide">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi voluptate error
                asperiores repellat quia nam nisi accusantium, cumque nulla, delectus corporis, voluptatibus
                nesciunt provident. Aliquam harum dicta dignissimos expedita et.</p>
            <form action="" class="search">
                <span class="icon-large"><i class="ri-mail-line"></i></span>
                <input type="mail" placeholder="Votre addresse email" required>
                <button>S'abonner</button>
            </form>
            <!-- <a href="#" class="mini-text t-close modalclose">Ne me montrez plus jamais ça</a> -->
            <a href="#" class="t-close modalclose">
                <i class="ri-close-line"></i>
            </a>
        </div>
    </div>
    <!-- End modal -->




    <?php include("inclusion/script.php"); ?>