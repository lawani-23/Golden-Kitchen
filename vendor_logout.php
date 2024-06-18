<?php 


error_reporting(E_ALL);
session_start();
require_once "classes/Vendor.php";

$vendor = new Vendor ;
$vendor->logout();
header("location:vendor_login.php");
exit();


?>