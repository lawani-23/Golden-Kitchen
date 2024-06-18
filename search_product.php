

<?php
 session_start();
 require_once "user_guard.php";
 require_once "partials/header.php";
 require_once "classes/User.php";
 require_once "classes/Product.php";
 require_once "classes/Cart.php";




$user = new User;
$data = $user->get_user_by_id($_SESSION['useronline']);

$product = new Product;
$pro =$product->get_all_products($data['user_category']);


?>
<!-- from here upward is the header -->
     <div class="container-fluid " style="padding-left:20px">

             <!-- marquee section  -->
             <div id="mar" style="text-align:end"marq class="col">
                <marquee> <span style="font-size: 20px;">  Place your order and it will be deliver to you at no time..... </span> </marquee>
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="process/process_search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data_value">
        <input type="submit"  name="search_data_product" value="search" class="btn btn-outline-light" >
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
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
                       <img src="image/Nigeria_kitchen4.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" data-bs-interval="1000">
                       <h5 style="color:white" >First slide label</h5>
                     <p style="color:white">Some representative placeholder content for the first slide.</p>
                    </div>
                    </div>
                   <div class="carousel-item">
                       <img src="image/Nigeria_kitchen10.png" class="d-block w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block" data-bs-interval="2000">
                       <h5 style="color:white">Second slide label</h5>
                      <p style="color:white">Some representative placeholder content for the second slide.</p>
                   </div>
                   </div>
                   <div class="carousel-item">
                      <img src="image/Nigeria_kitchen1.png" class="d-block w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                      <h5 style="color:white">Third slide label</h5>
                      <p style="color:white">Some representative placeholder content for the third slide.</p>
                   </div>
                   </div>

                   <div class="carousel-item">
                      <img src="image/Nigeria_kitchen3.png" class="d-block w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                      <h5 style="color:white">Third slide label</h5>
                      <p style="color:white">Some representative placeholder content for the third slide.</p>
                   </div>
                   </div>


                   <div class="carousel-item">
                      <img src="image/Nigeria_kitchen8.png" class="d-block w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                      <h5 style="color:white">Fourth slide label</h5>
                      <p style="color:white">Some representative placeholder content for the third slide.</p>
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

  

                    echo "<div class='col-md-3'>
                    <div><img src='uploads/$bimage' class=' height='30''  ></div>
                    <div>
                    <p> $bproduct</p>
                    <p> $bvendor </p>
                    <p> &#8358 $bprice</p>
                    <p> <a href= 'addtocart.php?id=$bid' class='btn btn-sm btn-warning' type='button'> add to cart </a> </p>            
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
                           
                        <div class="col-3  pt-3">
                          <h5 >Services</h5>
                          <ul class="list-unstyled">
                            <li class="mb-2"> <strong><a href="">Home</a> </strong></li>
                            <li class="mb-2"> <strong> <a href="file:///C:/Users/HP%20X360/OneDrive/Desktop/lawani_project/about.html">About Us</a></li> </strong>
                            <li class="mb-2"> <strong> <a href="">Logistic</a> </strong></li>
                            <li class="mb-2"> <strong> <a href="">Delivery</a> </strong></li>
                           </ul>
                        </div>
                        <div class="col-3  pt-3">
                          <h5> Categories </h5>
                          <ul class="list-unstyled">
                            <li class="mb-2"> <strong> <a href=""> Order</a> </strong> </li>
                            <li class="mb-2"> <strong> <a href=""> Order list</a> </strong> </li>
                            <li class="mb-2"> <strong> <a href=""> Menu list </a> </strong> </li>
                            <li class="mb-2"> <strong> <a href=""> Vendor </a> </strong> </li>
                            </ul>
                        </div>
                        
                        <div class="col-3 pt-3">
                          <h5>Community</h5>
                          <ul class="list-unstyled">
                            <li class="mb-2"> <strong> <a href="">Issues</a> </strong> </li>
                            <li class="mb-2"> <strong> <a href="">Discussions</a> </strong> </li>
                            <li class="mb-2"> <strong> <a href=""> Suggestion </a> </strong> </li>
                            </ul>
                        </div>
                                        
                        <div class="col-3  pt-3">
                          <h5> <a class="nav-link" href="file:///C:/Users/HP%20X360/OneDrive/Desktop/lawani_project/contact.html">Contact Us </a> </h5>
                          <h5> Contact info </h5>
                          <p style="text-align: left;">Email.info@goldenkitchengmail.com</p>
                          <p>+2348056654321</p>
                        </div>
                       
                     
                   </div>
                      
<?php 

require_once "partials/footer.php";
?>
    

    </script>
</body>
</html>