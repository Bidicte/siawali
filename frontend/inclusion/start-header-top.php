<?php 
include("action/database.php");
?>

<div class="header-top mobile-hide">
                <div class="container">
                    <div class="wrapper flexitem">
                        <div class="left">
                            <ul class="flexitem main-links">
                                <li><a href="#"><i class="ri-phone-fill"></i>+225 0700511392</a></li>
                                <li><a href="#"><i class="ri-mail-fill"></i>siawali0413@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="right">
                            <ul class="flexitem main-links">
                                <?php if(isset($_SESSION['auth'])) {?>
                                <li><a href="action/logout.php"><i class="ri-logout-box-r-line"></i>Déconnexion</a></li>
                                <li class=""><i class="ri-user-fill"><a href="#"><?= $_SESSION['customer_lastname']?></i></a></li>
                                <?php 
                                }else{
                                ?>
                                <li><a href="login.php">Me Connecter</a></li>
                                <li><a href="register.php">M'inscrire</a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>