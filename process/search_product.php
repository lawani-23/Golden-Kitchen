<?php


require_once "../home.php";
require_once "../classes/Product.php";

$search = new Product;
$st = $search->search_product();



if (isset($_GET['search_data_product'])){

    $search_data_value=$_GET['search_data'];
   
 
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