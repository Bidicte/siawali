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
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Sous-Titre</th>
                    <th>Description</th>
                    <th>Modifier un slider</th>
                    <th>Modifier Image1</th>
                    <th>Modifier Image2</th>
                    <th>Modifier Image3</th>
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
                        <a href="editSlider.php?slider_id=<?= $data['slider_id'];?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <a href="edit_image_slider.php?slider_id=<?= $data['slider_id'];?>" class="btn btn-success">Image</a>
                    </td>
                    <td>
                        <a href="edit_image1_slider.php?slider_id=<?= $data['slider_id'];?>" class="btn btn-success">Image1</a>
                    </td>
                    <td>
                        <a href="edit_image2_slider.php?slider_id=<?= $data['slider_id'];?>" class="btn btn-success">Image2</a>
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