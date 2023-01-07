<?php
// include ('articles/delete_sub_category.php');
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">

<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Catégorie</th>
                    <th>Sous-Catégorie</th>
                    <th>Date d'ajout</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                    $getInfosOfThisUser = $bdd->query('SELECT * FROM subcategory WHERE active=1');
                    $dataOfThisUser = $getInfosOfThisUser->fetchAll();
                    foreach($dataOfThisUser as $data) :
                ?>
                    <td><?php echo $data['category_id'];?></td>
                    <td><?php echo $data['subcategory_name'];?></td>
                    <td><?php echo $data['date'];?></td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this user?')" href="articles/delete_sub_category.php?subcategory_id=<?= $data['subcategory_id'];?>" class="btn btn-danger">Supprimer</a>
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