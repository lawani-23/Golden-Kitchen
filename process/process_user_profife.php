<?php

error_reporting (E_ALL);
session_start();
require_once "../user_guard.php";
require_once "../classes/User.php";
require_once "../classes/utilities.php";

if(isset($_POST['btnsubmit'])){
   

    $fname = sanitizer($_POST['fname']);
    $lname = sanitizer($_POST['lname']);
    $phone = sanitizer($_POST['phone']);
    $address = sanitizer($_POST['address']);
    $sta = sanitizer($_POST['state']);
    $lg = sanitizer($_POST['lg']);
    
    $user = new User;
    $user->update_user($fname, $lname,  $phone, $address, $state, $lg, $_SESSION['useronline']);
    if($check){
        $_SESSION['feedback'] = 'profile undated';
        header("location:../profile.php"); exit();
    }else{
        $_SESSION['errormsg'] = "something is wrong please try again";
        header("location:../profile.php");
        exit();
    }

}else{
    $_SESSION['errormsg'] = "please complete the form";
    header("location:../profile.php");
    exit();
}


?>