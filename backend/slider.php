<?php
include('slider/add_slider.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>

<div class="container-fluid">
<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ajouter un slider</h1>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Titre</label>
                                    <input type="text" name="title" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Sous-Titre</label>
                                    <input type="text" name="sous_titre" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Image1</label> <br>
                                    <input type="file" name="name_url" class="form-control-file">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="add_slider">
                                    Ajouter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include ('includes/scripts.php');
?>