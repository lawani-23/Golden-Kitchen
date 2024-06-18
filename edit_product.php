<?php
 session_start();
 require_once "partials/admin_header.php";
require_once "classes/Product.php";

$product = new Product;
$categories = $product->fetch_categories();
   

    if(isset($_GET["id"])){
        $tdetail = new Product;
        $det = $tdetail->get_product_by_id($_GET["id"]);
    }else{
        header("location:meal_product.php");
        exit();
    }
?>

<main>
                   

  <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                              <li class="breadcrumb-item active"><a href="add_product.html">Add Product</a></li>
                              <li class="breadcrumb-item active">Edit Product</li>
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

            <form action= "process/process_editproduct.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="title" class="form-label"> Meal Name</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $det['product_name']; ?>">
             
          </div>

          <div class="mb-3">
            <label for="title" class="form-label"> Vendor Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $det['vendor_name']; ?>">
             
          </div>
          <div class="mb-3">
            <label for="level" class="form-label">category</label>
           <select name="category" id="category" class="form-control">
            <option value="">Select One</option>

            <?php
                 foreach($categories as $category){
                    $categoryname = $category['category_name'];
                    $categoryid =$category['category_id'];
                    $cur = $categoryid==$det["product_category"]?  "selected" : "";

                    echo "<option value='$categoryid' $cur> $categoryname</option>";
                 }
            ?>
           </select>
          </div>
           
          <fieldset class="mb-3">
            <legend>Status</legend>
            <div class="form-check">
              <input type="radio" name="status" value="1" class="form-check-input" id="exampleRadio1" 
              <?php  echo $det["product_status"]== 0? "checked" : ""; ?>>
              <label class="form-check-label" for="exampleRadio1">Publish</label>
            </div>
            <div class="mb-3 form-check">
              <input type="radio" name="status" value="1" class="form-check-input" id="exampleRadio2" 
              <?php  echo $det["product_status"]== 1? "checked" : ""; ?>>
              <label class="form-check-label" for="exampleRadio2">Do Not Publish</label>
            </div>
          </fieldset>
          <div class="mb-3">
            <label class="form-label" for="customFile">Upload Cover</label>
            <input type="file" class="form-control" id="customFile" name="file">
          </div>

          <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="text" class="form-control" name="price" value="<?php echo $det['product_price']; ?>">
          </div>
                    <input type="hidden" name="id" value="<?php echo $det["product_id"] ?>">

          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="btnadd" value="add"> Edit Product !</button>
          </div>
          
         
          </form>
  </div>
 </div>
 </div>
 </main>
                
<?php
   require_once "partials/admin_footer.php";
?>
   