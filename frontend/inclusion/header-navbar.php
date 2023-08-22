<?php
include("action/database.php");
include("functions.php");
$ip_address = getRealUserIp();
$selectProduct = $bdd->query("SELECT * FROM cart WHERE ip_address='$ip_address'");
$count = $selectProduct->rowCount();

$total = 0;
while ($data2 = $selectProduct->fetch()) {
    $subtotal =  (int)$data2['product_quantity'] * (int)$data2['product_price'];
    $total += $subtotal;
}
$selectLogo = $bdd->query("SELECT * FROM logo");
$logo = $selectLogo->fetch();
?>
<div class="header-nav">
    <div class="container">
        <div class="wrapper flexitem">
            <a href="#" class="trigger desktop-hide"><span class="i ri-menu-2-line"></span></a>
            <div class="left flexitem">
                <div class="logo"><a href="index.php"><span class="circle"></span>.<?= $logo['logo_name'] ?></a></div>
                <nav class="mobile-hide">
                    <ul class="flexitem second-links">
                        <li><a href="#">Nouveautés</a></li>
                        <li><a href="livraison.php">Livraisons</a></li>
                        <li><a href="#">Retours & Remboursements</a></li>
                        <li>
                            <a href="#">Promos
                                <div class="fly-item"><span>New!</span></div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="right">
                <ul class="flexitem second-links">
                    <li><a href="cart.php" class="iscart">
                            <div class="icon-large">
                                <i class="ri-shopping-cart-line"></i>
                                <div class="fly-item"><span class="item-number">
                                        <?= $count; ?> </span></div>
                            </div>
                            <div class="icon-text">
                                <div class="mini-text">Total</div>
                                <div class="cart-total"><?= $total; ?>.000Fcfa</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>