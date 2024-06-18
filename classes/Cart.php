<?php

class Cart{

    public function add($id){
        if(isset($_SESSION['products'])){
            if(array_key_exists($id, $_SESSION['products'])){
                $existing_qty = $_SESSION['products'][$id];
                $_SESSION['products'][$id] =  $existing_qty + 1;
            }           
        }else{
            $_SESSION['products'] = [];
            array_push($_SESSION['products'],$id);
        }
    }

    public function addTocart($id){
        if(isset($_SESSION['products'])){
            if(array_key_exists($id,$_SESSION['products'])){
               
    
                $existing_qty = $_SESSION['products'][$id];
                $_SESSION['products'][$id] = $existing_qty + 1;
                
            }else{
                $_SESSION['products'][$id] = 1;
            }
    
        }else{
            $_SESSION['products'][$id] = 1;
            
        }
    
    }



}


?>