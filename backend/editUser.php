<?php
include('actions/editAction.php');
include('actions/securityAction.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>

<div class="container-fluid text-gray-900">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modifier un utilisateur</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <?php if(isset($successMessage))
                                        { echo
                                            '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                                                .$successMessage.
                                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>'.
                                            '</div>';
                                        }
                                ?>
                                <div class="form-group">
                                    <label>Noms</label>
                                    <input type="text" name="update_lastname" class="form-control" value="<?= $datas['user_lastname'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>Prénoms</label>
                                    <input type="text" name="update_firstname" class="form-control" value="<?= $datas['user_firstname'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="tel" name="update_phone" class="form-control" value="<?= $datas['user_phone'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="update_email" class="form-control" value="<?= $datas['user_email'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="update_address" class="form-control" value="<?= $datas['user_address'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Pseudo</label>
                                    <input type="text" name="update_login" class="form-control" value="<?= $datas['user_login'];?>">
                                </div>

                                <a href = "updateUsers.php" type="submit" class="btn btn-danger">Cancel</a>                    
                                <button type="submit" class="btn btn-primary" name="updateUser">Update</button>
                   
                               
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>