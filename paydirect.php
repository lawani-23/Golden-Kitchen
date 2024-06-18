<?php
session_start();
require_once "user_guard.php";
require_once "classes/Paystack.php";
require_once "classes/Transaction.php";
require_once "classes/User.php";

$pay = new Paystack ;

$reference = isset($_SESSION['refno']) ? $_SESSION['refno'] : 0;
$confirmation_from_paystack = $pay->paystack_verify($reference);

if($confirmation_from_paystack && $confirmation_from_paystack->status==1){

echo "payment complete, we will update payment table";

    echo "<pre>";
    print_r($confirmation_from_paystack);
    echo "</pre>";

   

}
else{
    echo "Invalid Transaction ID supplied";
}

?>