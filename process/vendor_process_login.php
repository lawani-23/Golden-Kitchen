<?php
 session_start();
 require_once "../classes/utilities.php";
  require_once "../classes/Vendor.php";




  $vendor = new Vendor;
  if(isset($_POST['btnlog'])){  
    
    $email = sanitizer($_POST['email']);
    $pwd = sanitizer($_POST['password']);

  
  
    $data = $vendor->login($email, $pwd);
    
    if($data){   //log in
        $_SESSION['vendoronline'] = $data;
        header("location:../vendor_dashboard.php");
        exit();
    }else{
        header("location:../vendor_login.php");
    }

  }else{  
     $_SESSION['errormsg'] = "Please complete the form";
     header("location:../vendor_login.php");
     exit();

  }
?>