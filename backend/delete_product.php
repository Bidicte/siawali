<?php
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">
<h3>Supprimer un produit</h3>
<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Image1</th>
                    <th>Title</th>
                    <th>Caractéristique</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                    $getInfosOfThisUser = $bdd->query('SELECT * FROM product WHERE active=1 ');
                    $dataOfThisUser = $getInfosOfThisUser->fetchAll();
                    foreach($dataOfThisUser as $data) :
                ?>
                    <td><img class="" src="<?= "imagesProducts/" .$data['name_url'];?>" width="100px"></td>
                    <td><?= $data['product_title'];?></td>
                    <td><?= $data['product_characteristic'];?></td>
                    <td><?= $data['product_description'];?></td>
                    <td><?= $data['product_quantity'];?></td>
                    <td><?= $data['product_price'];?>$</td>
                    <td><?= $data['product_color'];?></td>
                    <td><?= $data['product_size'];?></td>
                   
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this category?')" href="articles/delete_product.php?product_id=<?= $data['product_id'];?>" name="delete" class="btn btn-danger mb-3">DELETE</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>


<?php
include ('includes/scripts.php');
?>