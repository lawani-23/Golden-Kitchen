<?php

if(!isset($_SESSION['useronline'])){
    $_SESSION['errormsg'] ="you must be logged in to access this page";

    header("location:user_loginpage.php");  
}

?>