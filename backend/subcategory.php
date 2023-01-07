<?php
include ('articles/add_sub_category.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>

<div class="container-fluid">

<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">
        <h3>Ajouter une sous-catégorie</h3>

        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                          
                            <form class="user" method="POST">
                                <?php
                                $id = $_GET["category_id"];
                                $query = $bdd->prepare("SELECT category_name FROM category WHERE category_id =?");
                                $query->execute(array($id));
                                $nameCategory = $query->fetch();
                                      if(isset($message))
                                      {
                                          echo
                                          '<div class="alert alert-success alert-dismissible">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong>Bravo!</strong>' .$message. 
                                          '</div>';
                                      }
                                      
                                ?>
                                <div class="form-group">
                                    <h3>Catégorie: <?= $nameCategory['category_name'] ?></h3> <br>
                                    <label>Nom</label>
                                    <input type="text" name="category_name" class="form-control">
                                </div>
                                <br>

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