<?php
include('articles/edit_product.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

$id = $_GET['product_id'];
$req = $bdd->prepare('SELECT * FROM slider WHERE slider_id=?');
$req->execute(array($id));
$data = $req->fetch();
?>

<div class="container-fluid">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">
        <h3 class="">Edit Product</h3>

        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                          
                            <form class="user" method="POST" action="" enctype="multipart/form-data">
                                <?php if (isset($message)){
                                    echo $message;
                                }
                                ?>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="" value="<?= $data['product_title'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Caractéristique</label>
                                    <input type="text" name="caracterisque" class="form-control" placeholder="" value="<?= $data['product_characteristic'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="" value="<?= $data['product_description'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control" placeholder="" value="<?= $data['product_quantity'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Prix</label>
                                    <input type="number" name="price" class="form-control" placeholder="" value="<?= $data['product_price'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" name="color" class="form-control" placeholder="" value="<?= $data['product_color'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" name="size" class="form-control" placeholder="" value="<?= $data['product_size'];?>">
                                </div>
                                <br>
                                <a href="list_product.php" type="submit" class="btn btn-danger">Cancel</a>                    
                                <button type="submit" class="btn btn-primary" name="updateProduct">Update</button>
                   
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
include ('includes/scripts.php');
?>