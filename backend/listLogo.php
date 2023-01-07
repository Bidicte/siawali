<?php
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">
<h3>Modifier un slider</h3>
<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                    $getLogo = $bdd->query('SELECT * FROM logo WHERE active=1');
                    $dataLogo = $getLogo->fetchAll();
                    foreach($dataLogo as $data) :
                ?>
                    <td><?= $data['logo_name'];?></td>
                    <td><?= $data['logo_date_add'];?></td>
                    <td>
                        <a href="editLogo.php?logo_id=<?= $data['logo_id'];?>" class="btn btn-warning">Modifier</a>
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