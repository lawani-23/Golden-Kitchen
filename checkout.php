<?php



session_start();

error_reporting(E_ALL);

require_once "user_guard.php";
require_once "classes/User.php";
require_once "classes/Transaction.php";

$c = new Transaction ;



if(isset($_SESSION['products']) && !empty($_SESSION['products'])){
    $ref = time() .rand();  
    $_SESSION['refine'] = $ref;

    $trxid = $c->insert_transaction($ref , $_SESSION['useronline'], $_SESSION['products']);

    if($trxid){
      
        header("location:confirm.php");
        exit();

    }else{
        $_SESSION['errormsg'] = "please try check out again";
        header("location:paydirect.php");
        exit();
    }
}else{
    $_SESSION['errormsg'] = "please add items to cart";
    header("location:shop.php");
    exit();
}




?>