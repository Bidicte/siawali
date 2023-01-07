<?php
session_start();
include('actions/securityAction.php');
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">
    <h3>Détails utilisateur</h3>
    <div class="card-body card shadow mb-4">

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="">
                    <th>Photo de profil</th>
                    <th>Nom(s)</th>
                    <th>Prénom(s)</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Profil</th>
                    <th>Mot de passe</th>
                </tr>
            </thead>
            <tbody class="">
                <tr>
                <?php 
                    $getInfosOfThisUser = $bdd->query('SELECT * FROM users WHERE active= 1 and user_id >1 ');
                    $dataOfThisUser = $getInfosOfThisUser->fetchAll();
                    foreach($dataOfThisUser as $data) :
                ?>
                    <td><img width="100" src="<?= "images/". $data['name_url'];?>"></td>
                    <td><?php echo $data['user_lastname'];?></td>
                    <td><?php echo $data['user_firstname'];?></td>
                    <td><?php echo $data['user_phone'];?></td>
                    <td><?php echo $data['user_email'];?></td>
                    <td><?php echo $data['user_address'];?></td>
                    <td>
                        <a href="profile2.php?user_id=<?= $data['user_id'];?>" class="btn btn-warning">Détails</a>
                    </td>
                    <td>
                        <a href="changePassword.php?user_id=<?= $data['user_id'];?>" class="btn btn-success">Modifier</a>
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