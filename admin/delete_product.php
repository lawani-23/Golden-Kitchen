<?php


require_once "classes/Product.php";

    if(isset($_GET["id"])){
        // echo $_GET["id"];
        $id = $_GET["id"];

        $del1 = new Product;
        $response = $del1->delete_Product($id);

        if($response){

           
            echo "Delete Successfuly";
        }else{
            echo "sorry unable to delete";
        }
        header("Location: manage_product.php");
        exit();
    }
  
?>