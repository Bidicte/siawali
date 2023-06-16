<?php
include('actions/database.php');
$id = $_GET['user_id'];

if (isset($_POST['add_slider']))
{
    if(!empty($_POST['title']) && !empty($_POST['sous_titre']) && !empty($_POST['description']) && !empty($_FILES['name_url']))
    {
        $title = htmlspecialchars($_POST['title']);
        $sous_titre = htmlspecialchars($_POST['sous_titre']);
        $description = htmlspecialchars($_POST['description']);

        $img_name = $_FILES['name_url']['name'];

	    $img_size = $_FILES['name_url']['size'];

	    $tmp_name = $_FILES['name_url']['tmp_name'];

        $file_extension = strrchr($img_name, '.');

        $extensions = array(".pdf",".PDF",".jpg",".JPG",".png",".PNG",".bmp",".BMP");

        $file_destination = 'imagesSlider/'.$img_name;

        $checkIfSliderAreRegistered = $bdd->prepare('SELECT slider_title, slider_sub_title, slider_description FROM slider WHERE slider_title=?');
        $checkIfSliderAreRegistered->execute(array($title));

        if($checkIfSliderAreRegistered->rowCount() == 0){

                if(in_array($file_extension, $extensions))
                { 
                    if(move_uploaded_file($tmp_name, $file_destination))
                    {
                            $insertProduct = $bdd->prepare('INSERT INTO slider(slider_title, slider_sub_title, slider_description, name_url, user_id, active) VALUES(?,?,?,?,?,true)');
                            $insertProduct->execute(array($title, $sous_titre, $description, $img_name,$id));
                    
                            $message = "Ajout avec succèss";
                    }
                }else{
                    $message = "Veuillez télécharger un fichier valide";
                }
        }else{
            $message = "Ce slider existe déja";
        }
    }

}
?>                                
