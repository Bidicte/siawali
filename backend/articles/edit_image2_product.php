<?php
session_start();
include('actions/database.php');


$id = $_GET['product_id'];
$req = $bdd->prepare('SELECT * FROM product WHERE product_id=?');
$req->execute(array($id));
$data = $req->fetch();

if(isset($_POST['updateImage']))
{
    if(isset($_FILES['name_url2']))
    {
        
        $new_image = htmlspecialchars($_FILES['name_url2']);

        $img_name = $_FILES['name_url2']['name'];
	    $tmp_name = $_FILES['name_url2']['tmp_name'];
        $file_extension = strrchr($img_name, '.');
        $extensions = array(".pdf",".PDF",".jpg",".JPG",".png",".PNG",".bmp",".BMP");
        $file_destination = 'imagesProducts/'.$img_name;

        if(in_array($file_extension, $extensions))
        {
            if(move_uploaded_file($tmp_name, $file_destination))
            {
                $update_product = $bdd->prepare('UPDATE product SET name_url2=? WHERE product_id=?');
                $update_product->execute(array($img_name, $id));
        
                
                            
            }
        }
        
    }
    
}





?>