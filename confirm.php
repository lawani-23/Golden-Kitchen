<?php

session_start();

error_reporting(E_ALL);

require_once "user_guard.php";
require_once "partials/header_user.php";
require_once "classes/Transaction.php";
require_once "classes/User.php";
require_once "classes/Cart.php";
require_once "classes/Product.php";


$reference = isset($_SESSION['refine'])? $_SESSION['refine'] : 0;
if(!$reference){
    header("location:shop.php");

}

$t = new Transaction ;
$items = $t->get_transaction_byref($reference);
?>


<div class="container col-md-10 py-5" style="backgrouind-color:white;">
<?php require_once "partials/menu.php";  ?>

<div class="content">
<?php 

if(isset($_SESSION['products']) && !empty($_SESSION['products'])){

    echo "<table class='table table-striped'>
            <tr> 
                <th> S/N </th>
                <th> Item Name </th>
                <th> vendor Name </th>
                <th> Item Image </th>
                <th> Amount </th>
                <th> QTY </th>
                <th> Action </th>

            </tr>";
        $sn=1;  
         $total= 0;
    foreach($_SESSION['products']as $productid=> $product_qty){
      $product_details = $t->get_transaction_byref($reference); 
      $productname = $product_details['product_name']; 
      $productvendor = $product_details['vendor_name']; 
      $productimage = "uploads/".$product_details['product_image']; 
      $productprice = number_format( $product_details['product_price'] *$product_qty,2); 

      $total = $total + ( $product_details['product_price'] * $product_qty); 
    
      echo   " <tr> 
        <td> $sn </td>
        <td> $productname </td>
        <td>  $productvendor </td>
        <td> <img src='$productimage' height='40' </td>
        <td> $productprice</td>
        <td>$product_qty </td>
        <td> <a href='removecart.php?id=$productid' class='btn btn-sm btn-danger'> Remove</td>

    </tr>";
    $sn ++;
   
    }

    $formated_total = number_format($total,2);
     echo "<tr> <td> Total </td><td > $formated_total</td> </tr>";
       
     
    echo "</table>";
}else{
    echo "<div class='alert alert-info'> your cart empty </div>";
}

?>

<a href="emptycart.php"class='btn btn-danger'> Empty cart</a> &nbsp; &nbsp; &nbsp;
<a href="shop.php" class='btn btn-warning'> Continue Shopping</a> &nbsp; &nbsp; &nbsp;

<?php
 if(isset($_SESSION['products']) && !empty($_SESSION['products'])){
    echo "<a href='checkout.php' class='btn btn-dark noround'> checkout now </a>" ;
 }
?>  &nbsp; &nbsp; &nbsp;
<a href="pay.php" class='btn btn-success'> Confirm Payment Online </a>  &nbsp; &nbsp; &nbsp;
<a href="" class='btn btn-danger'> Choose Payment Option </a>  &nbsp; &nbsp; &nbsp;
</div>

</div> 