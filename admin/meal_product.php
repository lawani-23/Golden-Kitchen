<?php

session_start();
require_once "admin_guard.php";
require_once "partials/admin_header.php";
require_once "classes/Product.php";

$product = new Product;
$t = $product->get_all_products();
// echo "<pre>";
// print_r($t);
// echo "</pre>";

?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All Products </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="vendor_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Meal Menu </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            Various Meal Menu Listing 
                               &nbsp;&nbsp; <a href="add_product.php" class="btn btn-outline-primary">Add Product</a>
                            </div>
                        </div>

                        <?php 
                            if(isset($_SESSION['admin_feedback'])){
                                echo "<div class='alert alert-seccuess'>".$_SESSION['admin_feedback']."</div>";
                                unset($_SESSION['admin_feedback']);
                            }
                            
                            ?> 

                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Menu Created
                            </div>
                            <div class="card-body">
                               <table border="1" class="table table-striped">
                                      <thead>
                                            <tr>
                                               <th scope="col">S/N</th>
                                               <th scope="col">Product Name</th>
                                               <th scope="col">Company Name</th>
                                               <th scope="col">Category</th>
                                               <th scope="col"> image</th>
                                               <th scope="col">Action</th>
                                            
                                               </tr>
                                      </thead>
                                       <tbody>

                                            <?php 
                                            if(is_array($t)){
                                             $counter=1;
                                            foreach($t as $product){
  
  
  
                                             ?>
                                               <tr>
                                                 <th scope="row"> <?php echo $counter; ?> </th>
                                                 <td> <?php echo $product['product_name']; ?> </td>
                                                 <td> <?php echo $product['vendor_name']; ?> </td>
                                                 <td> <?php echo $product['product_category']; ?></td>
                                                 <td><img src="uploads/<?php echo $product['product_image']; ?>" height="40"></td>
                                                 <td><a href="edit_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-primary">Edit</a> 
                                                 <a onclick="return confirm('Are you sure you want to delete?')" href="delete_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-danger"> Delete </a> 
                                                 <a href="" class="btn btn-sm btn-success">Published</a></td>
                                              </tr>

                                         <?php 
                                       $counter++;
                                             } 
                                        }
                                      ?>
   
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </main>
    <?php 
            require_once "partials/admin_footer.php";
    
    ?>