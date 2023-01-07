<?php
include('articles/add_product.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/navbarSearch.php');
?>

<div class="container-fluid">
<div class="row justify-content-center">

    <div class="col-xl-12 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ajouter un produit</h1>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php if (isset($message)){
                                    echo '<div class="alert alert-success">' .$message. '</div>';
                                }
                                ?>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Choisir categorie</label>
                                    <?php
                                        $sql = "SELECT * FROM category WHERE active = 1";
                                        $query  = $bdd->prepare($sql);
                                        $query->execute();
                                    ?>
                                        <select name="category" class="form-control categorie" id="exampleFormControlSelect1">
                                        <option select="selected">Choisir...</option>
                                    <?php
                                        while ($data = $query->fetch()){ 
                                    ?>
                                        <option value="<?=$data["category_id"]?>"><?=$data["category_name"]?></option>                  
                                    <?php 
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label for="exampleFormControlSelect1">Choisir Sous-categorie</label>
                                        <select name="sous_cat" class="form-control souscat">
                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Selectionnez la sous-categorie qui existe dans la liste de la categorie que vous avez choisi svp!</small>
                                </div>
                                <div class="form-group">
                                    <label>Titre</label>
                                    <input type="text" name="title" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Caractérisque</label>
                                    <input type="text" name="caracterisque" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Quantité</label>
                                    <input type="number" name="quantity" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Prix</label>
                                    <input type="text" name="price" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Couleur</label>
                                    <input type="text" name="color" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" name="size" class="form-control" placeholder="">
                                </div>
                               
                                <div class="form-group">
                                    <label>Image1</label> <br>
                                    <input type="file" name="name_url" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label>Image2</label> <br>
                                    <input type="file" name="name_url1" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label>Image2</label> <br>
                                    <input type="file" name="name_url2" class="form-control-file">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="add_product">
                                    Ajouter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
   $(function(){
    $('.categorie').on('change',function(){
      
      var cat=$(this).val();
      if (cat.length>0) {
        $.post("getSubCategory.php",{'id':cat},function(data){
           if (data !=[]) {
            var opt='';
            for(i in data){
               opt+='<option value='+data[i].subcategory_id+'>'+data[i].subcategory_name+'</option>';

            }
            $('.souscat').html(opt);
           } 
        },'json')
      }
    })
  })
</script>