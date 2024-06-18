<?php

session_start();
require_once "admin_guard.php";
require_once "partials/admin_header.php";
require_once "../classes/Trans_details.php";

$trans_details = new Trans_details;

$t = $trans_details->fetch_trans_details();
// echo "<pre>";
// print_r($t);
// echo "</pre>";

?>
                <main>
                    <div class="container-fluid px-4">
                            <h1 class="mt-4">All Transactions </h1>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"> <strong> Transaction </strong> </li>
                            </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            Various Transactions Listing 
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
                               trans_details List
                            </div>
                            <div class="card-body">
                               <table border="1" class="table table-striped">
                                      <thead>
                                            <tr>
                                               <th scope="col">det_id</th>
                                               <th scope="col">product_id</th>
                                               <th scope="col">det_amt</th>
                                               <th scope="col"> det_transid</th>
                                               <th scope="col"> det_qty</th>
                                               <th scope="col">Action</th>
                                            
                                               </tr>
                                      </thead>
                                       <tbody>

                                            <?php 
                                            if(is_array($t)){
                                             $counter=1;
                                            foreach($t as $trans_details){
  
  
  
                                             ?>
                                               <tr>
                                                
                                                 <td> <?php echo $trans_details['det_id']; ?> </td>
                                                 <td> <?php echo $trans_details['product_id']; ?></td>
                                                 <td> <?php echo $trans_details['det_amt']; ?></td>
                                                 <td> <?php echo $trans_details['det_transid']; ?></td>
                                                 <td> <?php echo $trans_details['det_qty']; ?></td>
                                                
                                                 <td> 
                                                 <a onclick="return confirm('Are you sure you want to delete?')" href="delete_trans_details.php?id=<?php echo $trans_details['det_id']; ?>" class="btn btn-sm btn-danger"> Delete </a> 
                                                
                                                 
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