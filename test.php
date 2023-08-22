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
                        <div class="products one cart">
                            <div class="flexwrap">
                                    <div class="item">
                                        <table class="cart-table" id="cart-table">
                                            <thead>
                                                <tr>
                                                    <th>Article</th>
                                                    <th>Quantité</th>
                                                    <th>Prix Unitaire</th>
                                                    <th>Taille</th>
                                                    <th>Sous-Total</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                <?php
                                                $ip_address = getRealUserIp();
                                                $selectProduct = $bdd->query("SELECT * FROM cart2 WHERE ip_address='$ip_address'");
                                                $count = $selectProduct->rowCount();
                                                if($count == 0){
                                                ?>
                                                <tr>
                                                    <h3><?= "Votre panier est vide &#128532" ; ?></h3><br>
                                                </tr>
                                                <?php }elseif($count == 1){?>
                                                <tr>
                                                    <h3><?= "Il y a actuellement (".$count.") article dans le panier" ; ?></h3><br>
                                                </tr>
                                                <?php }else{?>
                                                <tr>
                                                    <h3><?= "Il y a actuellement (".$count.") articles dans le panier" ; ?></h3><br>
                                                </tr>
                                                <?php }?>
                                            </thead>
                                            <?php
                                                    $total = 0;
                                                    $subtotal = 0;
                                                    
                                                    $selectIdProduct = $bdd->query("SELECT * FROM cart2 WHERE ip_address='$ip_address'");
                                                    while($data1 = $selectIdProduct->fetch()){
                                                    $product_id = $data1['product_id'];
                                                    $ip_address = $data1['ip_address'];
                                                    
                                                    
                                                    $selectProduct = $bdd->query("SELECT * FROM product WHERE product_id='$product_id'");
                                                    while($data2 = $selectProduct->fetch()){
                                                ?>
                                            <tbody class="cart-items product-data">
                                                <form action="" class="form-cart" method="POST">
                                                    <tr class="cart-row">
                                                        <td class="flexitem">
                                                            <div class="thumbnail object-cover">
                                                                
                                                                <a href="#"><img src="../backend/imagesProducts/<?=$data2['name_url']?>" alt=""></a>
                                                            </div>
                                                            <div class="content">
                                                                <strong><a href="#"><?=$data2['product_title']?></a></strong>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="qty-control flexitem">
                                                                    <button class="minus updateQty" id="update">-</button>
                                                                    <input type="text" id="quantity" name="quantity" value="<?=$data1['product_quantity']?>" class="cart-quantity-input">
                                                                    <button class="plus updateQty" id="updateplus">+</button>
                                                                    <input type="hidden" id="id" name="cartId" value="<?=$data1['cart_id']?>">
                                                            </div>
                                                        </td>
                                                        <td class="cart-price"><?=$data1['product_price']?>.000Fcfa</td>
                                                        <td class="cart-price"><?=$data1['product_size']?></td>
                                                        <td class="cart-price"><?= $subtotal =  (int)$data1['product_quantity'] * (int)$data1['product_price'];?>.000Fcfa</td>
                                                        <td><button type="submit" name="item-remove" class="secondary-button" id="delete"><i class="ri-delete-bin-6-line"></i></a></td>
                                                    </tr>
                                                </form>
                                                </tbody>
                                                <?php } }?>
                                                <?php
                                                $total = 0;
                                                $ip_address = getRealUserIp();
                                                $selectProduct = $bdd->query("SELECT * FROM cart2 WHERE ip_address='$ip_address'");
                                                while($data2 = $selectProduct->fetch()){
                                                    $subtotal =  (int)$data2['product_quantity'] * (int)$data2['product_price'];
                                                    $total += $subtotal;
                                                }
                                                ?>
                                                <tr class="cart-total">
                                                    <th>Total</th>
                                                    <td class="cart-total-price"><?=$total;?>.000Fcfa</td>
                                                </tr>
                                        </table>
                                    </div>
                                    <div class="cart-summary styled">
                                    <div class="item">
                                        <div class="coupon">
                                            <input type="text" placeholder="Enter coupon code">
                                            <button>Appliquer</button>
                                        </div>
                                        <div class="shipping-rate collapse">
                                            <div class="has-child expand">
                                                <div class="content">
                                                    <div class="postal-code">
                                                        <form action="">
                                                            <label for="postal">Code Postal</label>
                                                            <input type="number" name="postal" id="postal">
                                                        </form>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-total">
                                            <a href="checkout.html" class="secondary-button">Valider ma commande</a>
                                        </div>
                                    </div>
                                </div>
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
            <!-- Jquery cdn -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function(){

                        $('.plus').click(function (e) {
                            e.preventDefault();

                            var quantity = $(this).closest('.product-data').find('#quantity').val();

                            var value = parseInt(quantity, 10);
                            value = isNaN(value) ? 0 : value;
                            if (value < 10){

                                value++;
                                $(this).closest('.product-data').find('#quantity').val(value);
                            }
                        });

                        $('.minus').click(function (e) {
                            e.preventDefault();

                            var quantity = $(this).closest('.product-data').find('#quantity').val();

                            var value = parseInt(quantity, 10);
                            value = isNaN(value) ? 0 : value;
                            if (value > 1){
                                
                                value--;
                                $(this).closest('.product-data').find('#quantity').val(value);
                            }
                        });

                        
                });
// Update quantity product in cart
                $(document).ready(function(){

                    $("#update").click(function(){

                        var quantity = $("#quantity").val();
                        var id = $("#id").val();
                        
                        $.ajax({
                            url:'getdata.php',
                            method:'POST',
                            data:{
                                quantity:quantity,
                                id:id
                            },
                            success:function(response){
                                alert(response);
                            }
                        });
                        
                    });
                });

                $(document).ready(function(){

$("#updateplus").click(function(){

    var quantity = $("#quantity").val();
    var id = $("#id").val();
    
    $.ajax({
        url:'getdata.php',
        method:'POST',
        data:{
            quantity:quantity,
            id:id
        },
        success:function(response){
            alert(response);
        }
    });
    
});
});                

// Delete product in cart 
                $(document).ready(function(){

$("#delete").click(function(){

    var id = $("#id").val();
    
    $.ajax({
        url:'delete.php',
        method:'POST',
        data:{
            id:id
        },
        success:function(response){
            // alert(response);
        }
    });
    
});
});
          </script>  

<?php include("inclusion/script.php");?>