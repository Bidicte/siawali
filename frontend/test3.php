<?php
include("action/add-cart.php");
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
                            <h1>Panier</h1>
                        </div>
  
                        
                        <div class="products one cart">
                            <div class="flexwrap">
                                <form action="" class="form-cart" id="myCart">
                                    <div class="item ">
                                        <table class="cart-table" id="cart-table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Prix</th>
                                                    <th>Quantité</th>
                                                    <th>Sous-total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="cart-items">
                                                <?php
                                                    $total = 0;
                                                    $items= $query->fetchAll();
                                                    foreach($items as $item) {
                                                ?>
                                                    <tr class="cart-row">
                                                        <td class="flexitem">
                                                            <div class="thumbnail object-cover">
                                                                <a href="#">
                                                                <img src="<?= "../backend/imagesProducts/" .$item['name_url'];?>" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <strong><a href="#"><?=$item['product_title']?></a></strong>
                                                            </div>
                                                        </td>
                                                        <td class="cart-price"><?= $item['product_price']?></td>
                                                        <td class="product-data">
                                                            <input type="hidden" class="productId" value="<?= $item['product_id']?>">
                                                            <div class="qty-control flexitem">
                                                                <button class="minus updateQty">-</button>
                                                                <input type="text" class="num" value="<?= $item['product_quantity']?>">
                                                                <button class="plus updateQty">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="product-data">
                                                           <div class="updateSubTotal">
                                                                <?php 
                                                                echo $total = $item['product_price'] * $item['product_quantity'];
                                                                ?>
                                                           </div>
                                                        </td>
                                                        <td class="">
                                                            <button type="submit" class="deleteItem" value="<?= $item['cid']?>">
                                                                <i class="ri-delete-bin-fill"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                    
                                                <tr class="cart-total">
                                                    <th>Total</th>
                                                    <td class="cart-total-price">XAF</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <div class="cart-summary styled">
                                    <div class="item">
                                        <div class="coupon">
                                            <input type="text" placeholder="Enter coupon code">
                                            <button>Appliquer</button>
                                        </div>
                                        <div class="shipping-rate collapse">
                                            <div class="has-child expand">
                                                <div class="content">
                                                    <!-- <div class="countries">
                                                        <form action="">
                                                            <label for="country">Pays</label>
                                                            <select name="country" id="country">
                                                                <option value=""></option>
                                                                <option value="1" selected="selected">Centrafrique
                                                                </option>
                                                                <option value="2">Cameroun</option>
                                                                <option value="3">Congo</option>
                                                                <option value="4">Cote d'Ivoire</option>
                                                                <option value="5">Cap-Vert</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                    <div class="states">
                                                        <form action="">
                                                            <label for="state">State/Province</label>
                                                            <select name="state" id="state">
                                                                <option value="">Selectionner la ville</option>
                                                                <option value="1" selected="selected">Bangui</option>
                                                                <option value="2">Douala</option>
                                                                <option value="3">Bangui</option>
                                                                <option value="4">Abidjan</option>
                                                                <option value="5">Bangui</option>
                                                            </select>
                                                        </form>
                                                    </div> -->
                                                    <br>
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
                                            <a href="/checkout" class="secondary-button">Valider</a>
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

            <script>
    // increment
        $(document).ready(function () {

                $('.plus').click(function (e) {
                    e.preventDefault();

                    var quantity = $(this).closest('.product-data').find('.num').val();

                    var value = parseInt(quantity, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value < 10){

                        value++;
                        $(this).closest('.product-data').find('.num').val(value);
                    }
                });

                $('.minus').click(function (e) {
                    e.preventDefault();

                    var quantity = $(this).closest('.product-data').find('.num').val();

                    var value = parseInt(quantity, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value > 1){
                        
                        value--;
                        $(this).closest('.product-data').find('.num').val(value);
                    }
                });

            $(document).on('click', '.updateQty',function () {

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
                    success: function (response){
                        // alert(response);
                    }
                });
            });

            $(document).on('click', '.deleteItem',function(){
                var cart_id = $(this).val();
                // alert(cart_id);

                $.ajax({
                    method: "POST",
                    url: "handlecart.php",
                    data: {
                        "cart_id": cart_id,
                        "scope": "delete"
                    },
                    success: function (response) {
                        if (response == 200) {
                            alertify.success("Le produit est supprimé");
                            $('#myCart').load(location.href + "#myCart");
                        }else{
                            alertify.success(response);
                        }
                    }
                });
            });
            
        });

        $(document).ready(function(){
            
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
<?php include("inclusion/script.php");?>