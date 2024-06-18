<?php

session_start();

require_once "../classes/utilities.php";
require_once "../classes/Product.php";

$search = new Product;
$t = $search->search_all_products();



if (isset($_GET['search_data_product'])){

    $search_data_value=$_GET['search_data'];
    
    $title= sanitizer($_POST['title']);
    $name= sanitizer($_POST['name']);
    $category = $_POST['category'];
    $status = isset($_POST['status'])?$_POST['status']: 1;
    $file = $_FILES['file'];
    $price = $_POST['price'];
 
         $response = $st->search_product($title, $name, $file, $price, $status, $category); 
         if($response){
             header("location:search_product.php");
             exit();
         }else{
             echo "unable to search product";
             exit();
         }
    

}

?>