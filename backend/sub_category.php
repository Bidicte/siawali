<?php
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">
<h3>Ajouter une sous-catégorie</h3>
<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                    $getInfosOfThisUser = $bdd->query('SELECT * FROM category WHERE active=1 ');
                    $dataOfThisUser = $getInfosOfThisUser->fetchAll();
                    foreach($dataOfThisUser as $data) :
                ?>
                    <td><?php echo $data['category_name'];?></td>
                    <td>
                        <a href="subcategory.php?category_id=<?= $data['category_id'];?>" class="btn btn-primary">Ajouter</a>
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