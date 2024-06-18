
<?php
 session_start();
 
 require_once "partials/header.php";
 require_once "classes/Product.php";

$product = new Product;
$pro =$product->get_all_products();


?>
<!-- from here upward is the header -->
     <div class="container-fluid " style="padding-left:20px">

             <!-- marquee section  -->
             <div id="mar" style="text-align:end"marq class="col">
                <marquee> <span style="font-size: 20px;"> Locate and Visit  Near By Restaurant or Place Your Order and it will be Deliver to  You at no Time ..... </span> </marquee>
             </div>
             
              <!-- nav section -->

              <div class="row sticky-top">
                <div class="col">
                    <div class="row ">
                    <div class="col">
                    <nav class="navbar navbar-expand-lg bg-danger">
                        <div class="container-fluid">
                         <a id="change" class="navbar-brand" href="#">Golden Kitchen</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                         </button>
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                         <a id="change"   class="nav-link active" aria-current="page" href="home.php">Home</a>
                         </li>
                         <li class="nav-item">
                           <a id="change"  class="nav-link" href="user_signup.php">Register</a>
                             </li>
                            
                        <li class="nav-item">
                       <a id="change"  class="nav-link " href="vendor_signup.php">Vendor</a>
                       </li>

                       <li class="nav-item">
                       <a id="change"  class="nav-link " href="./admin/index.php">Admin</a>
                       </li>

                       </ul>
                       
                      <form class="d-flex" role="search" action="prosess/search_product.php" method="get">

                     <input class="form-control me-2" type="search" placeholder="Search" 
                     aria-label="Search" name="search_data">

                <input type="submit"  name="search_data_product" value="search" class="btn btn-outline-light" >
             </form>

             <div class="image-container">
        <a style="padding-right: 10px;" id="change" href="showcart.php"><img id="myImage" src="image/icon_cart.png" alt="Order " style="width:30px;height:50px;"> </a>
      </div>
    </div>
  </div>
</nav>
</div>

 </div>
</div>
</div>

<!-- menu section start here  -->

<!-- <?php 
    if(isset($_SESSION['useronline'])){
      require_once "partials/menu.php"; 
    }
   
    
?> -->
<!-- menu section end here  -->
  <!-- banner section start here -->

            <div class="row">

                <div class="col-md">

                
                                          
              <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                     
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                       <img src="image/foodimage7.png" class="d-block h-80 w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" data-bs-interval="1000">
                       <h5 style="color:white" >Golden Food</h5>
                     <p style="color:white">Visit Us today and get most amazing Africa Food.</p>
                    </div>
                    </div>
                   <div class="carousel-item">
                       <img src="image/foodimage.png" class="d-block h-80 w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block" data-bs-interval="2000">
                       <h5 style="color:white">Mama Chika Kitchen</h5>
                      <p style="color:white">We provide delicious Africa Food Place your order and get deliver to you .</p>
                   </div>
                   </div>
                   <div class="carousel-item">
                      <img src="image/foodimage5.png" class="d-block h-80 w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                      <h5 style="color:white">Debi Kitchen</h5>
                      <p style="color:white"> Visit Us today .</p>
                   </div>
                   </div>

                   <div class="carousel-item">
                      <img src="image/foodimage3.png" class="d-block h-80 w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                      <h5 style="color:white">Food Mall</h5>
                      <p style="color:white">Order Your African Meal.</p>
                   </div>
                   </div>


                   <div class="carousel-item">
                      <img src="image/foodimage2.png" class="d-block h-80 w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                      <h5 style="color:white">Grill Restaurant</h5>
                      <p style="color:white"> Africa Best Food Available.</p>
                   </div>
                   </div>


                   </div>
                   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Previous</span>
                   </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Next</span>
                   </button>
                  </div>
                </div>-

            </div> 
            <hr>
                   <!-- banner section  end here -->




                   <!-- body section start here  -->

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

  

                    echo "<div  class='col-sm-3 mb-3 mb-sm-0'>
                    <div><img src='uploads/$bimage' class=' height='30''  ></div>
                    <div>
                    <p> $bproduct</p>
                    <p> $bvendor </p>
                    <p> &#8358 $bprice</p>
                    <p style='display:inline' > <a href= 'addtocart.php?id=$bid' class='btn btn-sm btn-warning' type='button'> add to cart </a> </p>            
                    <a href='#' class='btn btn-secondary'> Continue Shooping </a>
                    </div>
            
                      </div>";
                    } 
                    ?>
</div>
<?php
}

?>

              <!-- body section end here  -->
                                <hr>

                <!-- footer section start here  -->
<div class="row" style="background-color: lightgray">
  <div class="col-sm-3 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
       <h5 class="card-title">Contact Us</h5>
        <p class="card-text">For Your Comment and Enquire.</p>
        <a href="contact_page.php" class="btn btn-warning" style=" border-radius:50px">Contact Us</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
       <h5 class="card-title">About Us</h5>
        <p class="card-text"> About us and our Product .</p>
        <a href="about_page.php" class="btn btn-warning" style=" border-radius:50px">About Us</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title"> Follow our News Letter </h5>
     <p class="card-text"> Get Latest update.</p>
     <a href="#" class="btn btn-warning" style=" border-radius:50px"> checkout </a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title"> Partner With Us </h5>
      <p class="card-text">Become a comperate Partner with Us.</p>
      <a href="#" class="btn btn-warning" style=" border-radius:50px">Find OUt</a>
      </div>
    </div>
  </div>
</div>
               <hr>
<?php 

require_once "partials/footer.php";
?>
    

    </script>
</body>
</html>