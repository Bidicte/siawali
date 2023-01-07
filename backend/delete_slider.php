<?php
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">
<h3>Supprimer un slider</h3>
<div class="card-body card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Sous-Titre</th>
                    <th>Description</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                    $getInfosOfThisUser = $bdd->query('SELECT * FROM slider WHERE active = 1');
                    $dataOfThisUser = $getInfosOfThisUser->fetchAll();
                    foreach($dataOfThisUser as $data) :
                ?>
                    <td><img class="" src="<?= "imagesSlider/" .$data['name_url'];?>" width="100px"></td>
                    <td><?= $data['slider_title'];?></td>
                    <td><?= $data['slider_sub_title'];?></td>
                    <td><?= $data['slider_description'];?></td>
                    <td>
                        <a onclick="return confirm('Voulez-vous supprimer ce slider?')" href="slider/delete_slider.php?slider_id=<?= $data['slider_id'];?>" name="delete" class="btn btn-danger mb-3">DELETE</a>
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