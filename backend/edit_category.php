<?php
include('articles/edit_category.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

$id = $_GET['category_id'];
$req = $bdd->prepare('SELECT * FROM category WHERE category_id=?');
$req->execute(array($id));

$data = $req->fetch();
?>

<div class="container-fluid">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">
        <h3>Modifier une catégorie</h3>

        <div class="card o-hidden border-0 shadow m-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                      
                            <form class="user" action="" method="POST">
                                <?php if(isset($message)){echo '<div  class="alert alert-success">' .$message. '</div>';}?>                                        
                                <div class="form-group">
                                    <label>Nouveau nom</label>
                                    <input type="text" name="category_name" class="form-control" value="<?php echo $data['category_name'];?>">
                                </div>
                    
                                <a href="list_category.php" type="submit" class="btn btn-danger">Annuler</a>                    
                                <button type="submit" class="btn btn-primary" name="modify_category">Modifier</button>
                                </div>
                            </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>

<?php
include ('includes/scripts.php');
?>