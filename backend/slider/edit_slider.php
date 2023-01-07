<?php
session_start();
include('actions/database.php');

$id = $_GET['slider_id'];
$req = $bdd->prepare('SELECT * FROM slider WHERE slider_id=?');
$req->execute(array($id));
$data = $req->fetch();

if(isset($_POST['updateSlider']))
{
    if(isset(($_POST['title'])) && isset($_POST['sous_title']) && isset($_POST['description']))
    {
        $new_title = htmlspecialchars($_POST['title']);
        $new_sous_title = htmlspecialchars($_POST['sous_title']);
        $new_description = htmlspecialchars($_POST['description']);

        $update_product = $bdd->prepare('UPDATE slider SET slider_title=?, slider_sub_title=?, slider_description=? WHERE slider_id=?');
        $update_product->execute(array($new_title, $new_sous_title, $new_description, $id));
        
        header('Location:listSlider.php');
    }
    
}

?>