<?php
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">
<h3>Modifier les produits</h3>
<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Caractéristique</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Couleur</th>
                    <th>Taille</th>
                    <th>Modifier Produit</th>
                    <th>Modifier Image1</th>
                    <th>Modifier Image2</th>
                    <th>Modifier Image3</th>
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
                    <td><?= $data['product_price'];?>Fcfa</td>
                    <td><?= $data['product_color'];?></td>
                    <td><?= $data['product_size'];?></td>
                    <td>
                        <a href="edit_product.php?product_id=<?= $data['product_id'];?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <a href="edit_image_product.php?product_id=<?= $data['product_id'];?>" class="btn btn-success">Image</a>
                    </td>
                    <td>
                        <a href="edit_image1_product.php?product_id=<?= $data['product_id'];?>" class="btn btn-success">Image1</a>
                    </td>
                    <td>
                        <a href="edit_image2_product.php?product_id=<?= $data['product_id'];?>" class="btn btn-success">Image2</a>
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