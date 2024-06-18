<?php
 session_start();
     
     require_once "partials/admin_header.php";
     require_once "admin_guard.php";
     require_once "../classes/User.php";

     $user = new User;
     $userget = $user->fetch_user();

//  echo "<pre>";
//  print_r($userget);
//  echo "</pre>";

    
?>

<main>
                    <div class="container-fluid px-4">
                           <h1 class="mt-4">All Users </h1>
                           <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"> <strong> user</strong> </li>
                           </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            Various Users Listing 
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
                                               <th scope="col">fname</th>
                                               <th scope="col">lname</th>
                                               <th scope="col">Phone</th>
                                               <th scope="col"> Email</th>
                                               <th scope="col">Address</th>
                                               <th scope="col">date</th>
                                               <th scope="col">Action</th>
                                            
                                               </tr>
                                      </thead>
                                       <tbody>

                                            <?php 
                                            if(is_array($userget)){
                                             $counter=1;
                                            foreach($userget as $user){
                                             ?>
                                               <tr>
                                                 <th scope="row"> <?php echo $counter; ?> </th>
                                                 <td> <?php echo $user['user_fname']; ?> </td>
                                                 <td> <?php echo $user['user_lname']; ?> </td>
                                                 <td> <?php echo $user['user_phone']; ?></td>
                                                 <td> <?php echo $user['user_email']; ?></td>
                                                 <td> <?php echo $user['user_address']; ?></td>
                                                 <td> <?php echo $user['date_register']; ?></td>
                                                 <td><a onclick="return confirm('Are you sure you want to delete user?')" href="delete_user.php?id=<?php echo $user['user_id']; ?>" class="btn btn-sm btn-danger"> Delete </a> 
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