<?php


require_once "../classes/Vendor.php";

    if(isset($_GET["id"])){
        // echo $_GET["id"];
        $id = $_GET["id"];

        $del1 = new Vendor;
        $response = $del1->delete_Vendor($id);

        if($response){

           
            echo "Delete Successfuly";
        }else{
            echo "sorry unable to delete";
        }
        header("Location: manage_vendor.php");
        exit();
    }
  
?>