<?php
session_start();
include('actions/database.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');

if(isset($_SESSION['auth'])){
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['addLogo']) && !empty($_POST['logoContent'])){
        $content = $_POST['logoContent'];
        $insertLogo = $bdd->prepare("INSERT INTO logo(logo_name, logo_date_add, user_id, active) VALUES(?,NOW(),?,true)");
        $insertLogo->execute(array($content, $user_id));

        $selectLogo = $bdd->prepare("SELECT * FROM logo WHERE logo_name = ?");
        $selectLogo->execute(array($content));

        $dataLogo = $selectLogo->fetch();

        $_SESSION['auth'] = true;
        $_SESSION['logo_id'] = $dataLogo['logo_id'];
        $_SESSION['logo_name'] = $dataLogo['logo_name'];
        $_SESSION['message'] = "Logo ajouté avec success";
    }
}
?>

<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-9">
        <h3>Ajouter le logo</h3>
        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
           
                            <form class="user" method="POST">
                                <?php if(isset($message))
                                {echo
                                    '<div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Bravo!</strong>' .$message. 
                                    '</div>';
                                }?>
                                <div class="form-group">
                                    <label>Contenu du logo</label>
                                    <input type="text" name="logoContent" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary" name="addLogo">
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