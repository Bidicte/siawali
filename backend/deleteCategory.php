<?php
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
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Heure</th>
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
                        <a onclick="return confirm('Are you sure you want to delete this user?')" href="articles/delete_category.php?category_id=<?= $data['category_id'];?>" class="btn btn-danger">Supprimer</a>
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