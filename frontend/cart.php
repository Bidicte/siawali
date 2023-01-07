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
                            <h1>Mon panier</h1>
                        </div>
                        <!-- cart item essai -->
                        <!-- <div class="cart-items">
                            <p>lorem</p>
                            <div class="cart-row">
                                <div class="cart-price">$23</div>
                                <input type="number" class="cart-quantity-input">
                            </div>
                            <div class="cart-row">
                                <div class="cart-price">$23</div>
                                <input type="number" class="cart-quantity-input">
                            </div>
                        </div> -->
                        <div class="products one cart">
                            <div class="flexwrap">
                                <form action="" class="form-cart">
                                    <div class="item">
                                        <table class="cart-table" id="cart-table">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Subtotal</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="cart-items">
                                                <?php
                                                // To get the key for the array session
                                                $id = $_GET["product_id"];
                                                $req = $bdd->prepare("SELECT * FROM product WHERE product_id=?");
                                                $req->execute(array($id));
                                                while($product = $req->fetch()):
                                                
                                                ?>
                                                    <tr class="cart-row">
                                                        <td class="flexitem">
                                                            <div class="thumbnail object-cover">
                                                                <a href="#"><img src="../siawali/imagesProducts/<?=$product['name_url']?>" alt=""></a>
                                                            </div>
                                                            <div class="content">
                                                                <strong><a href="#"><?=$product['product_title']?></a></strong>
                                                                <p><?=$product['product_color']?></p>
                                                            </div>
                                                        </td>
                                                        <td class="cart-price"><?=$product['product_price']?>XAF</td>
                                                        <td>
                                                            <div class="qty-control flexitem">
                                                                <button class="minus">-</button>
                                                                <input type="number" value="1" class="cart-quantity-input">
                                                                <button class="plus">+</button>
                                                            </div>
                                                        </td>
                                                        <td><?=$product['product_price']?></td>
                                                        <td><a href="#" class="item-remove"><i class="ri-close-line"></i></a></td>
                                                    </tr>
                                                    <?php header("Location:index.php"); endwhile; ?>
                                                <!-- <tr class="cart-row" >
                                                    <td class="flexitem">
                                                        <div class="content">
                                                            <strong><a href="#" id="result"></a></strong>
                                                            <p>Couleur:vert</p>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <tr class="cart-row2">

                                                </tr>
                                                <!-- <tr class="cart-total">
                                                    <th>Total</th>
                                                    <td class="cart-total-price">$2300.00</td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End main -->


        <footer>
            

            <?php include("inclusion/footer-info.php");?>

            <?php include("inclusion/footer.php");?>

<?php include("inclusion/script.php");?>