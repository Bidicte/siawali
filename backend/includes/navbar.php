<?php
// include ('articles/delete_sub_category.php');
include('actions/database.php');

?>     
        
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sia Wali</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Utilisateurs</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="signupUser.php">Ajouter</a>
                        <a class="collapse-item" href="updateUsers.php">Modifier</a>
                        <a class="collapse-item" href="deleteUser.php">Supprimer</a>
                        <a class="collapse-item" href="listOfUsers.php">Détails</a>
                    </div>
                </div>
            </li>
            
            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Catégorie</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="category.php">Ajouter</a>
                        <a class="collapse-item" href="list_category.php">Modifier</a>
                        <a class="collapse-item" href="deleteCategory.php">Supprimer</a>
                        <a class="collapse-item" href="list_category.php">Détails</a>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie"
                    aria-expanded="true" aria-controls="collapseUtilitie">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Sous-catégorie</span>
                </a>
                <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilitie" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="sub_category.php">Ajouter</a>
                        <a class="collapse-item" href="list_sub_category.php">Modifier</a>
                        <a class="collapse-item" href="deleteSubCategory.php">Supprimer</a>
                        <a class="collapse-item" href="list_sub_category.php">Détails</a>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtility"
                    aria-expanded="true" aria-controls="collapseUtility">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Products</span>
                </a>
                <div id="collapseUtility" class="collapse" aria-labelledby="headingUtility"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="product.php">Ajouter</a>
                        <a class="collapse-item" href="edit_prod.php">Modifier</a>
                        <a class="collapse-item" href="delete_product.php">Supprimer</a>
                        <a class="collapse-item" href="list_product.php">Détails</a>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            
            <li class="nav-item">
           
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSlider"
                    aria-expanded="true" aria-controls="collapseSlider">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Slider</span>
                </a>
                <?php 
                    $getInfosOfThisUser = $bdd->query('SELECT * FROM users ');
                    $data = $getInfosOfThisUser->fetch();
                ?>
                <div id="collapseSlider" class="collapse" aria-labelledby="headingLogo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="slider.php?user_id=<?= $data['user_id'];?>">Ajouter</a>
                        <a class="collapse-item" href="listSlider.php">Modifier</a>
                        <a class="collapse-item" href="delete_slider.php">Supprimer</a>
                        <a class="collapse-item" href="detailSlider.php">Détails</a>
                </div>
            </li>

             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLogo"
                    aria-expanded="true" aria-controls="collapseLogo">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Logo</span>
                </a>
                <div id="collapseLogo" class="collapse" aria-labelledby="headingLogo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="logo.php">Ajouter</a>
                        <a class="collapse-item" href="listLogo.php">Modifier</a>
                        <a class="collapse-item" href="deleteLogo.php">Supprimer</a>
                </div>
            </li>
            
            <!-- Divider-->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="signupUser.php">Sign Up</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->



        
            <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> 

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="actions/logoutAction.php">Logout</a>
                </div>
            </div>
        </div>
    </div>        

    