<?php
include('actions/password_change.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

?>
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class=" col-lg-12 col-md-9">

            <h3 class="card-title">Changer de mot de passe</h3>
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <div class="card login-form">
	<div class="card-body">
			<form method="POST" action="" >
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php if(isset($message)) { echo '<strong>'. $message . '</strong>'.
                    '<a class="close" data-dismiss="alert" aria-label="Close">'.
                        '<span aria-hidden="true">&times;</span>'.
                    '</a>' ;} ?>
                </div>
				<div class="form-group">
					<label for="exampleInputEmail1">Mot de passe</label>
					<input type="password" name="pass1" class="form-control form-control-sm">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Retaper mot de passe</label>
					<input type="password" name="pass2" class="form-control form-control-sm">
				</div>
				<button name="password" type="submit" class="btn btn-primary btn-block submit-btn">Valider</button>
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