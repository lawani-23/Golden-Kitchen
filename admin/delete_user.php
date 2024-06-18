<?php


require_once "../classes/User.php";

    if(isset($_GET["id"])){
        // echo $_GET["id"];
        $id = $_GET["id"];

        $del1 = new User;
        $response = $del1->delete_user($id);

        if($response){

            
            echo "Delete Successfuly";
        }else{
            echo "sorry unable to delete";
        }
        header("Location: manage_user.php");
        exit();
    }
  
?>