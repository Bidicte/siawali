<?php
include('actions/database.php');

include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

if(isset($_POST['signup'])){
    $insertDate = $bdd->query('INSERT INTO jour(heure1, heure, nom) VALUES(now(), now(),"alexa")');
}
?>

<form action="" method="post">
<div class="container-fluid text-gray-900">
    <button type="submit" class="btn btn-primary" name="signup">Ajouter</button>
</div>

</form>


<?php
include ('includes/scripts.php');
?>
