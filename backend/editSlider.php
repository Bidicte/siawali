<?php
include("actions/database.php");
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

$id = $_GET['slider_id'];
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
                                    <label>Titre</label>
                                    <input type="text" name="title" class="form-control" placeholder="" value="<?= $data['slider_title'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Sous-Titre</label>
                                    <input type="text" name="sous_title" class="form-control" placeholder="" value="<?= $data['slider_sub_title'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="" value="<?= $data['slider_description'];?>">
                                </div>
                                <br>
                                <a href="list_product.php" type="submit" class="btn btn-danger">Cancel</a>                    
                                <button type="submit" class="btn btn-primary" name="updateSlider">Update</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
include ('includes/scripts.php');
?>