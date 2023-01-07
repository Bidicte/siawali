<?php
include('articles/add_category.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>

<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-9">
        <h3>Ajouter une catégorie</h3>
        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" method="POST">
                                <?php if(isset($message))
                                {echo
                                    '<div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Bravo!</strong>' .$message. 
                                    '</div>';
                                }?>
                                <div class="form-group">
                                    <label>Nom de la catégorie</label>
                                    <input type="text" name="category_name" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary" name="addCategory">
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