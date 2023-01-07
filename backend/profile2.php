<?php
include('actions/editImage.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

$id = $_GET['user_id'];
$getUsersDatas = $bdd->prepare('SELECT * FROM users WHERE user_id=?');
$getUsersDatas->execute(array($id));
$datas = $getUsersDatas->fetch();

?>

<div class="container">
    <h4>Mon Profil utilisateur</h4>
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?= "images/". $datas['name_url']?>" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <button class="btn btn-success">Active</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom complet</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= strtoupper($datas['user_lastname'])  . "   " .  $datas['user_firstname']?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $datas['user_email']?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $datas['user_phone']?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Adresse</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $datas['user_address']?></div>
                  </div>
                  <hr>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Changer de photo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><input type="file" name="name_url" class="form-control-file"></div>
                  </div>
                  <hr>
                  <div class="row">
                        <div class="col-sm-12">
                        <button type="submit"  class="btn btn-primary" name="editImage">Edit</button>
                        <a href="listOfUsers.php" class="btn btn-warning" name="editPhoto">Annuler</a>
                        </div>
                    </div>
                </form>
                </div>
              </div>
</div>
<?php
include ('includes/scripts.php');
?>