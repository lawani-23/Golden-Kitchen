<?php


require_once "../classes/Trans_details.php";

    if(isset($_GET["id"])){
        // echo $_GET["id"];
        $id = $_GET["id"];

        $del1 = new Trans_details;
        $response = $del1->delete_trans_details($id);

        if($response){

          
            echo "Delete Successfuly";
        }else{
            echo "sorry unable to delete";
        }
        header("Location: manage_trans_details.php");
        exit();
    }
  
?>