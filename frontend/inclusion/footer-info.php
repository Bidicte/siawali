<?php
include("action/database.php");
$selectLogo = $bdd->query("SELECT * FROM logo");
$logo = $selectLogo->fetch();
?>

<div class="widgets">
                <div class="container">
                    <div class="wrapper">
                        <div class="flexwrap">
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>Aide & Contact</h4>
                                    <ul class="flexcol">
                                        <li><a href="#">Mon Compte</a></li>
                                        <li><a href="#">Information</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>Nos services</h4>
                                    <ul class="flexcol">
                                        <li><a href="#">Comment commander?</a></li>
                                        <li><a href="#">Livraisons</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>Moyen de paiement</h4>
                                    <ul class="flexcol">
                                        <li><a href="#">Payer à la livraison</a></li>
                                        <li><a href="#">Payer par mobile money</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="item mini-links">
                                    <h4>Nos Médias Sociaux</h4>
                                    <ul class="flexcol">
                                        <li><a href="https://www.facebook.com/SiiaWali/">Facebook</a></li>
                                        <li><a href="#">Instagram</a></li>
                                        <li><a href="https://wa.me/message/L6Y3MF6NN2CZH1">whatsapp</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget -->

            <!-- Footer infos -->
            <div class="footer-info">
                <div class="container">
                    <div class="wrapper">
                        <div class="flexcol">
                            <div class="logo">
                                <a href="#"><span class="circle"></span>.<?= $logo['logo_name']?></a>
                            </div>
                            <div class="socials">
                                <ul class="flexitem">
                                    <li><a href="https://www.facebook.com/SiiaWali/"><i
                                                class="ri-facebook-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    <li><a href="https://wa.me/message/L6Y3MF6NN2CZH1"><i
                                                class="ri-whatsapp-line"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="mini-text"> &copy; <?php echo date("Y");?> - Siawali by MVAlexa</p>
                    </div>
                </div>
            </div>