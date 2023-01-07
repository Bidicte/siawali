<?php
include('articles/edit_sub_category.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

$id = $_GET['subcategory_id'];
$req = $bdd->prepare('SELECT * FROM subcategory WHERE subcategory_id=?');
$req->execute(array($id));
$data = $req->fetch();
?>

<div class="container-fluid">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow m-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modifier une sous Catégorie</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <?php
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
                                    <label>Nouveau nom</label>
                                    <input type="text" name="subcategory_name" class="form-control" placeholder="name of category..." value="<?php echo $data['subcategory_name'];?>">
                                </div>
                                <a href="list_sub_category.php" type="submit" class="btn btn-danger">Annuler</a>                    
                                <button type="submit" class="btn btn-primary" name="updateCategory">Modifier</button>
                   
                            </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>

<?php
include ('includes/scripts.php');
?>