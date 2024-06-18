<?php
 session_start();
 require_once "user_guard.php";
 require_once "partials/header_user.php";
 require_once "classes/User.php";
 require_once "classes/Product.php";

$user = new User;
$data = $user->get_user_by_id($_SESSION['useronline']);

$product = new Product;
$pro =$product->get_all_products($data);


?>
<!-- from here till topmost top as header.php-->

<div class="container  col-md-10 py-5" style="background-color: white;">

<?php require_once "partials/menu.php"; ?>

<div class="content">
    <div class="container-fluid">
        
    <?php
if(empty($pro)){
    echo "<div class='row'
    <div class='col'> <p class='alert alert-info'> please select a product </p>
    </div /div>";
}else{
    ?>
    <div class="row">
    <?php
    foreach($pro as $prod){
        $bproduct = $prod['product_name'];
        $bvendor = $prod['vendor_name'];
        $bprice = number_format($prod['product_price'],2);
        $bimage = $prod['product_image'];
        $bid = $prod['product_id'];

        echo "<div class='col-md-3'>
        <div><img src='uploads/$bimage' class=' height='30''  ></div>
        <div>
        <p> $bproduct</p>
        <p> $bvendor </p>
        <p> &#8358 $bprice</p>
        <p> <a href= 'addtocart.php?id=$bid' class='btn btn-sm btn-warning' type='button'> add to cart </a> </p>
      
        </div>

        </div>";
    } 
    ?>

    </div>
    <?php
}

?>

    </div>
</div>
</div>
<!-- From here till end as footer.php--> 
<?php
  require_once "partials/footer.php";
?>
