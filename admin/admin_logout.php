<?php 

error_reporting(E_ALL);
session_start();

require_once "classes/Admin.php";

$admin = new Admin;

$admin->admin_logout();
header("location:index.php");

exit();



?>