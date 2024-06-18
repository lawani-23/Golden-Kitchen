<?php
error_reporting();

session_start();

unset($_SESSION['products']);
header("location:showcart.php");
exit();






  
?> 