<?php
 session_start();
 error_reporting(E_ALL);
 require_once "user_guard.php";
 require_once "classes/User.php";
 require_once "classes/Cart.php";



$id = isset($_GET['id']) ? $_GET['id'] : 0;

if($id){
    $cart = new Cart;
    $cart->addTocart($id);
    header("location:showcart.php");


}else{
    header("location:shop.php");
    exit();
}





?>