<?php
include('actions/addUser.php');
if(!isset($_SESSION['user_id'])){
    header('Location:index.php');
}
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>


<div class="container-fluid">

<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">
       <h3>Ajouter un utilisateur</h3>

        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            
             
                            <form class="user" method="POST" enctype="multipart/form-data">
                                <?php
                                    if(isset($message))
                                    {
                                       echo '<div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Bravo!</strong>' .$message. 
                                    '</div>';
                                    }
                                    
                                ?>
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="user_lastname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input type="text" name="user_firstname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="tel" name="user_phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="user_email" class="form-control" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="user_address" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Pseudo</label>
                                    <input type="text" name="user_login" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe(8 characters minimum)</label>
                                    <input type="password" name="user_password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                </div> 
                                <div class="form-group">
                                    <label>Image</label> <br>
                                    <input type="file" name="name_url" class="form-control">
                                </div>
                                <br>

                                <button type="submit" class="btn btn-primary" name="signup">
                                    Sign up
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
