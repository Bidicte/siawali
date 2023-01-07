<?php
session_start();
include('actions/securityAction.php');
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">

    <h3>Modifier un utilisateur</h3>
<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="">
                    <th>Noms</th>
                    <th>Prénoms</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                <tr>
                <?php 
                    $getInfosOfThisUser = $bdd->query('SELECT * FROM users WHERE active= 1 and user_id >1 ');
                    $dataOfThisUser = $getInfosOfThisUser->fetchAll();
                    foreach($dataOfThisUser as $data) :
                ?>
                    <td><?php echo $data['user_lastname'];?></td>
                    <td><?php echo $data['user_firstname'];?></td>
                    <td><?php echo $data['user_phone'];?></td>
                    <td><?php echo $data['user_email'];?></td>
                    <td><?php echo $data['user_address'];?></td>
                    <td>
                    <a href="editUser.php?user_id=<?= $data['user_id'];?>" class="btn btn-primary">Modifier</a>
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