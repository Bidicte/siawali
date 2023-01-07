<?php
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">
<h3>Modifier une catégorie</h3>
<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date Ajout</th>
                    <th>Heure Ajout</th>
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
                    <td><?php echo $data['day'];?></td>
                    <td><?php echo $data['hour'];?></td>
                    <td>
                        <a href="edit_category.php?category_id=<?= $data['category_id'];?>" class="btn btn-primary">Modifier</a>
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