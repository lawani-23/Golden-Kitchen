<?php
session_start();
require_once "user_guard.php";
require_once "partials/header_user.php";
require_once "classes/User.php";

require_once "classes/Transaction.php";

$transaction = new Transaction;

$t = $transaction->get_transaction_by_id();


$user = new User;
$data = $user->get_user_by_id($_SESSION['useronline']);

?>
<!-- menu barstart here  -->
<?php  require_once "partials/menu.php"  ?>
 <!-- menu bar ends here  -->

<!-- from here till topmost top as header.php-->
<div class="container col-xxl-8 px-4 py-5"  >

 <div class="row">
        <div class="col text-center color-primary">
        <p>Click  on drop-down button on  right to update your profile  </p>
        </div>
 </div>
 
 <div class="row">
       

        <div class="col content bg-body-secondary"  style=" padding:5em">
        <h3>Welcome!<?php echo ucfirst($data['user_fname']); ?></h3>
        <p> Place Your Order..... </p>
        </div>
</div>

<div class="row"> 
        <main>
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
                                                 <a onclick="return confirm('Are you sure you want to delete?')" href="delete_product.php?id=<?php echo $transaction['trans_id']; ?>" class="btn btn-sm btn-danger"> Delete </a> 
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

                    
                        </div>
               
            
</div>
     

 
 <!-- From here till end as footer.php--> 
<!-- FOOTER -->
<?php
require_once "partials/footer.php";
?>