<?php

if(!isset($_SESSION['vendoronline'])){
    $_SESSION['errormsg'] ="you must be logged in to access this page";

    header("location:vendor_login.php");  
}

?>