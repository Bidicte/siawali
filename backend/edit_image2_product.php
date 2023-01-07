<?php
include('articles/edit_image2_product.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

$id = $_GET['product_id'];
$req = $bdd->prepare('SELECT * FROM product WHERE product_id=?');
$req->execute(array($id));
$data = $req->fetch();

?>

<div class="container-fluid">

<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">

        <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            
                            <form class="user" method="POST" enctype="multipart/form-data">
                                <?php if(isset($message)){
                                    echo $message;
                                }
                                    
                                ?>
                               <img src="<?= "imagesProducts/" .$data['name_url2'];?>" alt="" width="100px">
                               <div class="form-group">
                                    <label>Image2</label> <br>
                                    <input type="file" name="name_url2" class="form-control-file">
                                </div>
                                <br>
                                <a href="list_product.php" type="submit" class="btn btn-danger">Cancel</a>                    
                                <button type="submit" class="btn btn-primary" name="updateImage">Update</button>
                   
                                
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
include ('includes/scripts.php');
?>