<?php
include("action/add-cart.php");
include("authenticate.php");
include("inclusion/header.php");

$items= $query->fetchAll();
$count = $query->rowcount();
foreach($items as $item) {
var_dump($_POST);
if(isset($_SESSION['auth'])){ 
    if(isset($_POST['order'])){
        if(!empty($_POST['com']) && !empty($_POST['location']) && !empty($_POST['num'])){
            $commune = htmlspecialchars($_POST['com']);
            $amount = $item['product_quantity'];
            $location = htmlspecialchars($_POST['location']);
            $number = htmlspecialchars($_POST['num']);
            $customer = $_SESSION['customer_id'];
            $quantity = $item['product_quantity'];

            $insertOrder = $bdd->prepare("INSERT INTO customer_order(customer_id, order_amount, order_quantity, order_date, order_commune, order_location, active) VALUES(?,?,?, NOW(),?,?, true)");
            $insertOrder->execute(array($customer, $amount,$quantity, $commune, $location ));
            echo "reussi";
        }
    }
}
}

$selectOrder = $bdd->query("SELECT * FROM cart2");
$order = $selectOrder->fetch();



$total = 0;
while($order = $selectOrder->fetch()){
    $subtotal =  (int)$order['product_quantity'] * (int)$order['product_price'];
    $total += $subtotal;
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
            <!-- Checkout -->
            <div class="single-checkout">
                <div class="container">
                    <div class="wrapper">
                    <form action="" method="post">
                        <div class="checkout flexwrap">
                            <div class="item left styled">
                                <h1>Addresse de Livraison</h1>
                               
                                    <p>
                                        <label for="com">Commune<span></span></label>
                                        <input type="text" name="com" id="com" required>
                                    </p>
                                    <p>
                                        <label for="location">Lieu précis<span></span></label>
                                        <input type="text" name="location" id="location" required>
                                    </p>
                                    <p>
                                        <label for="num">Téléphone<span></span></label>
                                        <input type="text" name="num" id="num" required>
                                    </p>

                                <div class="shipping-methods">
                                    <!-- <h2>Shipping Methods</h2> -->
                                    <p class="checkset">
                                        <!-- <input type="radio" checked>
                                        <label for="">$5.00</label> -->
                                    </p>
                                </div>
                                <div class="primary-checkout">
                                    <button class="primary-button" name="order">Passer la commande</button>
                                </div>
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
                                            <li>
                                                <span>Total</span>
                                                <strong><?= $total.".000Fcfa";?></strong>
                                                <input type="hidden" name="amount" value="<?= $total;?>">
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="products mini">
                                        <?php
                                            $total = 0;
                                            $subtotal = 0;
                                            $items= $query->fetchAll();
                                            $count = $query->rowcount();
                                            foreach($items as $item){
                                        ?>
                                        <li class="item">
                                            <div class="thumbnail object-cover">
                                                <img src="<?= "../backend/imagesProducts/" .$item['name_url'];?>" alt="">
                                            </div>
                                            <div class="item-content">
                                                <p><?= $item['product_title']?></p>
                                                <span class="price">
                                                    <span><?= $item['product_price'].".000Fcfa"?></span>
                                                    <span>x <?= $item['product_quantity']?></span>
                                                    <input type="hidden" name="quantity" value="<?= $item['product_quantity']?>">
                                                </span>
                                            </div>
                                        </li>
                                        <?php }?>
                                    </ul>
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

        <?php include("inclusion/footer-info.php");?>
            <!-- End Footer infos -->
            <?php include("inclusion/footer.php");?>

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




    <?php include("inclusion/script.php");?>