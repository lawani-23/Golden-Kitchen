<?php
 session_start();
     
     require_once "partials/admin_header.php";
     require_once "vendor_guard.php";
     require_once "classes/Vendor.php";

     $vendor = new Vendor;
    $data = $vendor->get_vendor_by_id($_SESSION['vendoronline']);
    
?>

        <main>
                  
        <div class="container-fluid shadow px-4">
                        <h3>Welcome!<?php echo ucfirst($data['vendor_cname']); ?></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                          
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Products </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="meal_product.php">View Product Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Vendors </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Vendors  Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        
                    </div>
                </main>
                
    <?php
     require_once "partials/admin_footer.php";
    ?>