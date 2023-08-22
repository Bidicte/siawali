<?php
session_start();
include("action/database.php");

    if(isset($_POST['scope'])){

        $scope = $_POST['scope'];
        switch($scope)
        {
            case "add":
                $product_id = $_POST['product_id'];
                $product_size = $_POST['product_size'];
                $product_quantity = $_POST['product_quantity'];
                $product_price = $_POST['product_price'];

                $customer_id = $_SESSION['customer_id'];
                
                $checkIfProductAlreadyExists = $bdd->query("SELECT * FROM cart2 WHERE product_id = '$product_id' AND product_quantity = '$product_quantity'");
                $row = $checkIfProductAlreadyExists->rowCount();
                if($row > 0)
                {
                    echo "existing";
                }
                else
                {
                    $insertProductInCart = $bdd->query("INSERT INTO cart2(product_id,product_quantity,product_size, product_price, cart_date) VALUES('$product_id','$product_quantity','$product_size','$product_price',NOW())");

                    if($insertProductInCart)
                    {
                        echo 201;
                    }
                    else 
                    {
                        echo 500;
                    }
                }

                break;
                
            case 'update':
                $product_id = $_POST['product_id'];
                $product_quantity = $_POST['product_quantity'];
                $customer_id = $_SESSION['customer_id'];
                
                $checkIfProductAlreadyExists = $bdd->query("SELECT * FROM cart2 WHERE product_id = '$product_id'");
                $row = $checkIfProductAlreadyExists->rowCount();
                if($row > 0)
                {
                    $updateCart = $bdd->query("UPDATE cart2 SET product_quantity = '$product_quantity' WHERE product_id = '$product_id'");
                    if($updateCart)
                    {
                        echo 200;
                    }else{
                        echo 500;
                    }
                }
                else
                {
                    echo "Une erreur s'est produite";
                }

                break;

            case 'delete':
                $cart_id = $_POST['cart_id'];

                $customer_id = $_SESSION['customer_id'];
                $checkIfProductAlreadyExists = $bdd->query("SELECT * FROM cart2 WHERE cart_id = '$cart_id'");
                $row = $checkIfProductAlreadyExists->rowCount();
                if($row > 0)
                {
                    $deleteItem = $bdd->query("DELETE FROM cart2 WHERE cart_id = '$cart_id' ");
                    if($deleteItem)
                    {
                        echo 200;
                    }else{
                        echo "Une erreur s'est produite";
                    }
                }
                else
                {
                    echo "Une erreur s'est produite";
                }
                break;

                case 'deleteAll':
                    $cart_id = $_POST['cart_id'];
    
                    $customer_id = $_SESSION['customer_id'];
                    $checkIfProductAlreadyExists = $bdd->query("SELECT * FROM cart2");
                    $row = $checkIfProductAlreadyExists->rowCount();
                    if($row > 0)
                    {
                        $deleteItem = $bdd->query("DELETE FROM cart2");
                        if($deleteItem)
                        {
                            echo 200;
                        }else{
                            echo "Une erreur s'est produite";
                        }
                    }
                    else
                    {
                        echo "Une erreur s'est produite";
                    }
                    break; 
            
            default:
                echo 500;
        }
    }


?>