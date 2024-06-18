<?php
 session_start();
  require_once "../classes/utilities.php";
  require_once "../classes/User.php";

  $user = new User;
  if(isset($_POST['btnlogin'])){  
   
    $email = sanitizer($_POST['email']);
    $pwd = sanitizer($_POST['password']);
   
    $data = $user->login($email, $pwd);
    if($data){  
        $_SESSION['useronline'] = $data;
        header("location:../user_profile.php");
        exit();
    }else{
        header("location:../user_loginpage.php");
    }

  }else{ 
    $_SESSION['errormsg'] = "Please complete the form";
    header("location:../user_loginpage.php");
    exit();

  }
?>