<?php

error_reporting(E_ALL);
session_start();
require_once "../classes/General.php";
require_once "../classes/Product.php";

if($_POST['btnadd']){
   
   $meal = General::sanitize($_POST['title']);
   $meal = General::sanitize($_POST['name']);
   $category = $_POST['category'];
   $status = isset($_POST['status']) ? $_POST['status'] : 1 ;
   $file = $_FILES['file'];
   $amount = $_POST['price'];

   $product = new Product;
        $response = $product->update_product($title, $name, $file, $price, $status, $category); 
        if($response){
            header("location:../product.php");
            exit();
        }else{
            echo "unable to update product";
            exit();
        }


}


?>