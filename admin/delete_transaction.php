<?php


require_once "../classes/Transaction.php";

    if(isset($_GET["id"])){
        // echo $_GET["id"];
        $id = $_GET["id"];

        $del1 = new Transaction;
        $response = $del1->delete_transaction($id);

        if($response){

        
            echo "Delete Successfuly";
        }else{
            echo "sorry unable to delete";
        }
        header("Location: manage_transaction.php");
        exit();
    }
  
?>