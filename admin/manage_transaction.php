<?php

session_start();
require_once "admin_guard.php";
require_once "partials/admin_header.php";
require_once "../classes/Transaction.php";

$transaction = new Transaction;

$t = $transaction->fetch_transaction();
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
                               Transactions List
                            </div>
                            <div class="card-body">
                               <table border="1" class="table table-striped">
                                      <thead>
                                            <tr>
                                               <th scope="col">trans_id</th>
                                               <th scope="col">trans_ref</th>
                                               <th scope="col">trans_date</th>
                                               <th scope="col"> trans_totamt</th>
                                               <th scope="col"> trans_by</th>
                                               <th scope="col">Action</th>
                                            
                                               </tr>
                                      </thead>
                                       <tbody>

                                            <?php 
                                            if(is_array($t)){
                                             $counter=1;
                                            foreach($t as $transaction){
  
  
  
                                             ?>
                                               <tr>
                                                
                                                 <td> <?php echo $transaction['trans_id']; ?> </td>
                                                 <td> <?php echo $transaction['trans_ref']; ?></td>
                                                 <td> <?php echo $transaction['trans_date']; ?></td>
                                                 <td> <?php echo $transaction['trans_totamt']; ?></td>
                                                 <td> <?php echo $transaction['trans_by']; ?></td>
                                                
                                                 <td> 
                                                 <a onclick="return confirm('Are you sure you want to delete?')" href="delete_transaction.php?id=<?php echo $transaction['trans_id']; ?>" class="btn btn-sm btn-danger"> Delete </a> 
                                                 <!-- <a href="" class="btn btn-sm btn-success">Published</a></td> -->
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