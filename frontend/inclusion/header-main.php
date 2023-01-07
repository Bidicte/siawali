<div class="header-main mobile-hide">
                <div class="container">
                    <div class="wrapper flexitem">
                        <div class="left">
                            <div class="dpt-cat">
                                <div class="dpt-head">
                                    <div class="main-text">Achetez par catégories</div>
                                    <div class="mini-text mobile-hide">Total: 150 Vetements et Accs</div>
                                    <a href="#" class="dpt-trigger mobile-hide">
                                        <i class="ri-menu-3-line ri-xl"></i>
                                        <i class="ri-close-line ri-xl"></i>
                                    </a>
                                </div>
                                <div class="dpt-menu">
                                    <ul class="second-links">
                                        <?php
                                            $selectCategory = $bdd->query("SELECT * FROM category WHERE active=1");
                                            while($category = $selectCategory->fetch()):
                                        ?>
                                        <li class="has-child beauty">
                                            
                                            <a href="#">
                                                <?= $category['category_name']?>
                                                <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                            </a>
                                            <ul>
                                                <?php
                                                    $id = $category['category_id'];
                                                    $selectSubCategory = $bdd->prepare("SELECT * FROM subcategory WHERE category_id =?");
                                                    $selectSubCategory->execute(array($id));
                                                    while ($subcategory = $selectSubCategory->fetch()){
                                                ?>
                                                <li><a href="#"><?= $subcategory['subcategory_name'] ?></a></li>
                                                <?php  } ?>
                                                
                                            </ul>
                                        </li>
                                        <?php endwhile ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="search-box">
                                <form action="" class="search">
                                    <span class="icon-large"><i class="ri-search-line"></i></span>
                                    <input type="search" name="" id="" placeholder="Rechercher un article">
                                    <button type="submit">Rechercher</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>