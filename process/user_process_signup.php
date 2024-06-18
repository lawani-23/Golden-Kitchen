<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/User.php');
    require_once('../classes/utilities.php');

    $user = new User;

  
    if(isset($_POST['btnregister'])){

        #retrieve form data and sanitize
        $firstname = sanitizer ($_POST['fname']);
        $lastname = sanitizer($_POST['lname']);
        $email = sanitizer($_POST['email']);
        $phone = sanitizer($_POST['phone']);
        $pwd = sanitizer($_POST['pwd']);

        if(empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($pwd)){
            $_SESSION['errormsg'] = "All fields are required";
            header("location:../user_profile.php");
            exit();

        }else{
          $chk =  $user->insert_user($firstname,$lastname,$email, $phone, $pwd);
            if ($chk){
                $_SESSION['useronline'] = $chk;
                header("location:../user_profile.php");
            }else{
                header("location:../user_signup.php");
            }

        }

    }else{
        $_SESSION['errormsg'] = "Please pass through the door and complete the form";
        header("location:../register.php");
        exit();
    }


?>