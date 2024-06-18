<?php
 session_start();
     
     require_once "partials/admin_header.php";
     require_once "admin_guard.php";
	 require_once "classes/Admin.php";
    
?>

        <main>
                  
        <div class="container-fluid shadow px-4">
                        <h1 class="mt-4"> Manage User </h1>
                        <ol class="breadcrumb mb-4">
                        <a class="small text-white stretched-link"  href="dashboard.php "> <li class="breadcrumb-item active"> 
                            <strong>Dashboard </strong></li></a>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body"> Orders</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Manage Order Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Products </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_product.php"> Manage Product Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Vendors </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_vendor.php">Manage Vendors  Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							

                        </div>
                         
                        <div class="col-xl-6 col-md-6"> 
								  <h1> Manage User</h1>
						</div>
                    </div>

                    
			
      </main>
                
    <?php
     require_once "partials/admin_footer.php";
    ?>