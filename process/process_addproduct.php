<?php
  error_reporting(E_ALL);
  session_start();
  require_once "../classes/utilities.php";
  require_once "../classes/Product.php";

  if($_POST['btnadd']){
   
     $title= sanitizer($_POST['title']);
     $name= sanitizer($_POST['name']);
     $state= sanitizer($_POST['state']);
     $lga= sanitizer($_POST['lga']);
     $address= sanitizer($_POST['address']);
     $category = $_POST['category'];
     $status = isset($_POST['status'])?$_POST['status']: 1;
     $file = $_FILES['file'];
     $price = $_POST['price'];

   
     $errors = [];
     if(empty($title)){
        array_push($errors, "specify the title");
     } 
     
     if (empty($category)){
        array_push($errors, "specify the category");
     }

    if ($_FILES['file']['name'] ==""){
            array_push($errors, "Select a file to upload");
    }

      if($errors){
        $_SESSION['admin_errormsg'] = $errors;
        header("location:../add_product.php");
        exit();
      }  
       
     else{
        $product = new Product;
        $chk = $product->add_newproduct($title, $name, $file, $price, $status,$category, $state,$lga,$address); 
        if($chk){
            header("location:../meal_product.php");
            exit();
        }else{
            header("location:../add_product.php");
            exit();
        }
        
     }
 
    }else{ 
    $_SESSION['admin_errormsg'] = "Please complete the form";
    header("location:../add_prodect.php");
    exit();
  }
?>