<?php
 session_start();
     
     require_once "partials/admin_header.php";
     require_once "admin_guard.php";
     require_once "../classes/Vendor.php";

     $vendor = new Vendor;
     $venget = $vendor->fetch_vendor();

//  echo "<pre>";
//  print_r($venget);
//  echo "</pre>";

    
?>

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All Vendor </h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"> <strong> Vendor</strong> </li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            Various Vendors Listing 
                               &nbsp;&nbsp; <a href="dashboard.php" class="btn btn-outline-primary">Dashboard</a>
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
                              Users Menu Created
                            </div>
                            <div class="card-body">
                               <table border="1" class="table table-striped">
                                      <thead>
                                            <tr>
                                               <th scope="col">S/N</th>
                                               <th scope="col">cname</th>
                                               <th scope="col">fname</th>
                                               <th scope="col">Phone</th>
                                               <th scope="col"> Email</th>
                                               <th scope="col">Address</th>
                                               <th scope="col">Date</th>
                                               <th scope="col">Action</th>
                                            
                                               </tr>
                                      </thead>
                                       <tbody>

                                            <?php 
                                            if(is_array($venget)){
                                             $counter=1;
                                            foreach($venget as $vendor){
                                             ?>
                                               <tr>
                                                 <th scope="row"> <?php echo $counter; ?> </th>
                                                 <td> <?php echo $vendor['vendor_cname']; ?> </td>
                                                 <td> <?php echo $vendor['vendor_fname']; ?> </td>
                                                 <td> <?php echo $vendor['vendor_phone']; ?></td>
                                                 <td> <?php echo $vendor['vendor_email']; ?></td>
                                                 <td> <?php echo $vendor['vendor_address']; ?></td>
                                                 <td> <?php echo $vendor['date_register']; ?></td>
                                                 <td><a onclick="return confirm('Are you sure you want to delete vendor?')" href="delete_vendor.php?id=<?php echo $vendor['vendor_id']; ?>" class="btn btn-sm btn-danger"> Delete </a> 
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