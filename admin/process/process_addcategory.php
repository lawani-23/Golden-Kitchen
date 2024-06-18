<?php
  error_reporting(E_ALL);
  session_start();
  require_once "../classes/General.php";
  require_once "../classes/Product.php";

  if($_POST['btnadd']){
    
     $title = General::sanitize($_POST['title']);
    
    
     $errors = [];
     if(empty($title)){
        array_push($errors, "specify the title");
     } 
     if (empty($name)){
      array_push($errors, "specify the name");
   }
     
     if (empty($category)){
        array_push($errors, "specify the category");
     }

    if ($_FILES['file']['name'] ==""){
            array_push($errors, "Select a file to upload");
    }

      if($errors){
        $_SESSION['admin_errormsg'] = $errors;
        header("location:../add_category.php");
        exit();
      }  
       
     else{
        $product = new Product;
        $chk = $product->add_newproduct($title, $name, $file, $price, $status, $category); 
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