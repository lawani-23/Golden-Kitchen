<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/Vendor.php');
    require_once('../classes/utilities.php');

    $vendor = new Vendor;

   
    if(isset($_POST['btnsignup'])){

       
        $companyname = sanitizer ($_POST['cname']);
        $fullname = sanitizer($_POST['fname']);
        $email = sanitizer($_POST['email']);
        $phone = sanitizer($_POST['phone']);
        $pwd = sanitizer($_POST['pwd']);

        if(empty($companyname) || empty($fullname) || empty($email) || empty($phone) || empty($pwd)){
            $_SESSION['errormsg'] = "All fields are required";
            header("location:../vendor_signup.php");
            exit();

        }else{
          $chk =  $vendor->insert_vendor($companyname,$fullname,$email, $phone, $pwd);
            if ($chk){
                $_SESSION['vendoronline'] = $chk;
                header("location:../vendor_dashboard.php");
            }else{
                header("location:../vendor_signup.php");
            }

        }

        


    }else{
        $_SESSION['errormsg'] = "Please pass through the door and complete the form";
        header("location:../register.php");
        exit();
    }


?>