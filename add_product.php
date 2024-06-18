<?php
 session_start();
 require_once "partials/admin_header.php";
require_once "classes/Product.php";

    $product = new Product;
    $categories = $product->fetch_categories();



?>

<main>
                   

  <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Product Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Vendor Dashboard</li>
                              <li class="breadcrumb-item active"><a href="meal_product.php">All Meal  Product</a></li>
                              <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                      <div class="row">
                          <div class="col">
                       
                       <?php
                          if(isset($_SESSION['admin_errormsg']) && is_array($_SESSION['admin_errormsg'])){
                              $errors = $_SESSION['admin_errormsg'];
                         
                           }
                        if (isset($_SESSION['admin_errormsg']) && !is_array($_SESSION['admin_errormsg'])){
                            echo "<div class='alert alert-danger'>".$_SESSION['admin_errormsg']."</div>";
                            unset($_SESSION['admin_errormsg']);
                        }

                        ?>

  <form action= "process/process_addproduct.php" method="post" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="title" class="form-label"> Product Name </label>
            <input type="text" class="form-control" id="title" name="title"> 
          </div>

          <div class="mb-3">
            <label for="name" class="form-label"> Vendor Name </label>
            <input type="text" class="form-control" id="name" name="name"> 
          </div>

          <div class="mb-3">
            <label for="level" class="form-label">Category</label>
           <select name="category" id="category" class="form-control">
            <option value="">Select One</option>

            <?php
                 foreach($categories as $category){
                    $categoryname = $category['category_name'];
                    $categoryid =$category['category_id'];

                    echo "<option value='$categoryid'> $categoryname</option>";
                 }
            ?>
      
           </select>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label"> Vendor State </label>
            <input type="text" class="form-control" id="state" name="state"> 
          </div>

          <div class="mb-3">
            <label for="name" class="form-label"> Vendor LGA</label>
            <input type="text" class="form-control" id="lga" name="lga"> 
          </div>

          <div class="mb-3">
            <label for="name" class="form-label"> Vendor Address </label>
            <input type="text" class="form-control" id="address" name="address"> 
          </div>
           
          <fieldset class="mb-3">
            <legend>Status</legend>
            <div class="form-check">
              <input type="radio" name="status" value="1" class="form-check-input" id="exampleRadio1">
              <label class="form-check-label" for="exampleRadio1">Publish</label>
            </div>
            <div class="mb-3 form-check">
              <input type="radio" name="status" value="0" class="form-check-input" id="exampleRadio2">
              <label class="form-check-label" for="exampleRadio2">Do Not Publish</label>
            </div>
          </fieldset>

          <div class="mb-3">
            <label class="form-label">price</label>
            <input type="text" class="form-control" name="price">
          </div>

          <div class="mb-3">
            <label class="form-label" for="customFile">Upload Meal</label>
            <input type="file" class="form-control" id="customFile" name="file">
          </div>

          

          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="btnadd" value="add">Add Product!</button>
          </div>
          
         
          </form>
  </div>
 </div>
 </div>
 </main>
                
<?php
   require_once "partials/admin_footer.php";
?>
   