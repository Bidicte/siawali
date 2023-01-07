<?php
session_start();
include('actions/database.php');


$id = $_GET['slider_id'];
$req = $bdd->prepare('SELECT * FROM slider WHERE slider_id=?');
$req->execute(array($id));
$data = $req->fetch();

if(isset($_POST['updateImage']))
{
    if(isset($_FILES['name_url']))
    {
        
        $new_image = $_FILES['name_url'];

        $img_name = $_FILES['name_url']['name'];
	    $tmp_name = $_FILES['name_url']['tmp_name'];
        $file_extension = strrchr($img_name, '.');
        $extensions = array(".pdf",".PDF",".jpg",".JPG",".png",".PNG",".bmp",".BMP");
        $file_destination = 'imagesSlider/'.$img_name;

        if(in_array($file_extension, $extensions))
        {
            if(move_uploaded_file($tmp_name, $file_destination))
            {
                $update_product = $bdd->prepare('UPDATE slider SET name_url=? WHERE slider_id=?');
                $update_product->execute(array($img_name, $id));
        
                // header('Location:listSlider.php');
                            
            }
        }
        
    }
    
}





?>