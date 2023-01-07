<?php
include('actions/editAction.php');
include('actions/securityAction.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
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
                                <h1 class="h4 text-gray-900 mb-4">Profile User</h1>
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
                                                          
<div class="container">
  <div class="row">
        <div class="d-flex align-items-center">
            <img class="mb-3" src="<?= $datas['file_url']?>" alt="..." width="150px">
        </div>
    </div>
    
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" name="update_firstname" class="form-control" value="<?= $datas['user_firstname'];?>" >
        </div>
        <div class="form-group">
            <label>Lastanme</label>
            <input type="text" name="update_lastname" class="form-control" value="<?php echo $datas['user_lastname'];?>">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="tel" name="update_phone" class="form-control" value="<?php echo $datas['user_phone'];?>">
        </div>
        

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="update_email" class="form-control" value="<?php echo $datas['user_email'];?>">
        </div>
        <div class="form-group">
            <label>Adress</label>
            <input type="text" name="update_address" class="form-control" value="<?php echo $datas['user_address'];?>">
        </div>
        <div class="form-group">
            <label>Login</label>
            <input type="text" name="update_login" class="form-control" value="<?php echo $datas['user_login'];?>">
        </div>
        <div class="form-group">
            <a href="editUser.php?user_id=<?= $datas['user_id'];?>" name="updateUser" class="btn btn-primary mb-3">EDIT</a>
            <a onclick="return confirm('Are you sure you want to delete this user?')" href="actions/deleteAction.php?user_id=<?= $datas['user_id'];?>" name="delete" class="btn btn-danger mb-3">DELETE</a>
        </div>
    </div>
    </form>

  </div>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>