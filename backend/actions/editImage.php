<?php
session_start();
include('actions/database.php');

$id = $_GET['user_id'];
$getUsersDatas = $bdd->prepare('SELECT * FROM users WHERE user_id=?');
$getUsersDatas->execute(array($id));
$datas = $getUsersDatas->fetch();


if(isset($_POST['editImage']))
{
    if(isset($_FILES['name_url']))
    {
        $img_name = $_FILES['name_url']['name'];
	    $tmp_name = $_FILES['name_url']['tmp_name'];
        $file_extension = strrchr($img_name, '.');
        $extensions = array(".pdf",".PDF",".jpg",".JPG",".png",".PNG",".bmp",".BMP");
        $file_destination = 'images/'.$img_name;

        if(in_array($file_extension, $extensions))
        {
            if(move_uploaded_file($tmp_name, $file_destination))
            {
                $update_product = $bdd->prepare('UPDATE users SET name_url=? WHERE user_id=?');
                $update_product->execute(array($img_name, $id));
        
                            
            }
        }

        
    }
    
}

?>