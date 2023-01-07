<?php 
include('actions/database.php');

if (isset($_POST['id'])) 
{
       $id=$_POST['id'];
       $requser = $bdd->prepare('SELECT * FROM subcategory WHERE category_id = ?');
       $requser->execute(array($id));
       $userinfo = $requser->fetchAll();
              
       echo json_encode($userinfo);
}



?>

 