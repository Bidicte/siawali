<?php
include('actions/database.php');

if (isset($_POST['add_product']))
{
    if(!empty($_POST['category']) && !empty($_POST['sous_cat']) && !empty($_POST['title']) && !empty($_POST['caracterisque']) && !empty($_POST['description']) && !empty($_POST['quantity']) && !empty($_POST['price']) && !empty($_POST['color']) && !empty($_POST['size']) && !empty($_FILES['name_url']) && !empty($_FILES['name_url1']))
    {
        $category = htmlspecialchars($_POST['category']);
        $subcategory = htmlspecialchars($_POST['sous_cat']);
        $title = htmlspecialchars($_POST['title']);
        $caracterisque = htmlspecialchars($_POST['caracterisque']);
        $description = htmlspecialchars($_POST['description']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $price = htmlspecialchars($_POST['price']);
        $color = htmlspecialchars($_POST['color']);
        $size = htmlspecialchars($_POST['size']);

        $img_name = $_FILES['name_url']['name'];
        $img_name1 = $_FILES['name_url1']['name'];
        $img_name2 = $_FILES['name_url2']['name'];
	    $img_size = $_FILES['name_url']['size'];
	    $tmp_name = $_FILES['name_url']['tmp_name'];
	    $tmp_name1 = $_FILES['name_url1']['tmp_name'];
	    $tmp_name2 = $_FILES['name_url2']['tmp_name'];
        $file_extension = strrchr($img_name, '.');
        $file_extension1 = strrchr($img_name1, '.');
        $file_extension2 = strrchr($img_name2, '.');
        $extensions = array(".pdf",".PDF",".jpg",".JPG",".png",".PNG",".bmp",".BMP");

        $file_destination = 'imagesProducts/'.$img_name;
        $file_destination1 = 'imagesProducts/'.$img_name1;
        $file_destination2 = 'imagesProducts/'.$img_name2;

            if(in_array($file_extension, $extensions) && in_array($file_extension1, $extensions) && in_array($file_extension2, $extensions))
            { 
                if(move_uploaded_file($tmp_name, $file_destination) && move_uploaded_file($tmp_name1, $file_destination1) && move_uploaded_file($tmp_name2, $file_destination2))
                {
                    $insertProduct = $bdd->prepare('INSERT INTO product(category_name, subcategory_name,product_title, product_characteristic, product_description, product_quantity, product_price, product_color, product_size, name_url,name_url1,name_url2, active) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,true)');
                    $insertProduct->execute(array($category, $subcategory, $title, $caracterisque, $description, $quantity, $price, $color, $size, $img_name, $img_name1, $img_name2));

                    $getInfosOfthisProduct = $bdd->prepare('SELECT product_id, product_title FROM product WHERE product_title=?');
                    $getInfosOfthisProduct->execute(array($title));
                    
                    $data = $getInfosOfthisProduct->fetch();

                    $_SESSION['auth'] = true;
                    $_SESSION['product_id'] = $data['product_id'];
                    $_SESSION['message'] = "Le produit a été ajouté avec succèss";

                }
            }else{
                $_SESSION['message'] = "Veuillez télécharger un fichier valide";
            }
        }

}
?>                                
