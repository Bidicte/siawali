<?php 
    include('actions/password_change.php'); 
    if(!empty($_GET['u'])){
        $token = htmlspecialchars(base64_decode($_GET['u']));
        $check = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = ?');
        $check->execute(array($token));
        $row = $check->rowCount();

        if($row == 0){
            echo "Lien non valide";
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

  <body class="bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body">
                    
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                            </div>
                            <div class="form-group">
                                <form class="user"  method="POST">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <?php if(isset($message) ){ echo'<p>'.$message. '</p>'; }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control form-control-user" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>"  />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required />
                                    </div><br />

                                    <div class="form-group">
                                        <input type="password" name="password_repeat" class="form-control form-control-user" placeholder="Retype Password" required />
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Change my password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>