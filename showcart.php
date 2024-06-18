<?php
 session_start();
 error_reporting(E_ALL);

 require_once "user_guard.php";
require_once "classes/User.php";
require_once "classes/Cart.php";
require_once "partials/header_user.php";
require_once "classes/Product.php";

 $user = new User;
 $data = $user->get_user_by_id($_SESSION['useronline']);
 $t = new Product;

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
      $product_details = $t->get_product_by_id($productid); 
      $product_id = $product_details['product_id'];
      $productname = $product_details['product_name']; 
      $productvendor = $product_details['vendor_name']; 
      $productimage = "uploads/".$product_details['product_image']; 
      $productprice = number_format( $product_details['product_price'] *$product_qty,2); 
  
      $total = $total + ( $product_details['product_price'] * $product_qty); 

      echo   " <tr> 
        <td> $sn </td>
        <td> $productname </td>
        <td> $productvendor </td>
        <td> <img src='$productimage' height='20'> </td>
        <td> $productprice</td>
        <td>$product_qty </td>

      
        <td> <a href='removecart.php?id=$product_id' class='btn btn-sm btn-danger'> Remove
       
        
        </td>

    </tr>";
    $sn ++;
   
    }

    $formated_total = number_format($total,2);
    echo "<tr> <td><b> Total </b> </td><td colspan= '2'> </td><td> $formated_total</td><td colspan='2'></td> </tr>";

    echo "</table>"; 
 
}else{
    echo "<div class='alert alert-info'> Your cart is empty.....
    click on continue shopping to add product to your cart !
     </div>";
}

?>
<a href="emptycart.php"class='btn btn-danger'> Empty cart</a> &nbsp; &nbsp; &nbsp;
<a href="shop.php" class='btn btn-warning'> continue shopping</a> &nbsp; &nbsp; &nbsp;
<?php
 if(isset($_SESSION['products']) && !empty($_SESSION['products'])){
    echo "<a href='checkout.php' class='btn btn-success noround'> checkout now </a>";
 }
?>
</div>

</div>