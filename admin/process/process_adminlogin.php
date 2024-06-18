<?php

    error_reporting(E_ALL);
    session_start();

    // print_r($_POST);

    require_once "../classes/Admin.php";
    require_once "../classes/General.php";

    $admin = new Admin ;
   

    if($_POST['btnlogin']){
        $email = General::sanitize($_POST['email']);
        $pwd = General::sanitize($_POST['password']);
        $result = $admin->admin_login($email,$pwd);
        if($result ==1){

            header("location:../dashboard.php");
            exit();

        }else{
            header("location:../index.php");
           }
        
    }else{
        $_SESSION['admin_errormsg'] = "please complete complete the form";
        header("location:../index.php");
        exit();
    }
 

?>


