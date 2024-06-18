<?php

error_reporting(E_ALL);
   require_once "Db.php";

class Product extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function fetch_categories(){
        $sql = "SELECT * FROM category";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
        return $record;
    }

    public function fetch_product(){
        $sql = "SELECT * FROM product";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll();
        return $record;
    }

    

    public function get_all_products(){

        $query = "SELECT * FROM pro_products JOIN category ON product_category=category_id";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute();
        $record = $stmt->fetchAll();
        return $record;
    }
    

    public function get_user_products(){
        $query = "SELECT * FROM pro_products JOIN category ON product_category=category_id WHERE product_status=1";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute();
        $record = $stmt->fetchAll();
        return $record;
    }
    public function add_newproduct($title,$name, $file, $price,$status, $category,$state,$lga,$address){
      
       $original = $file['name'];
       $temp=$file['tmp_name'];
       $r = explode(".",$original);

       $newname = time().rand().".".end($r);
        move_uploaded_file($temp,"../uploads/$newname");

      
        try{
        $query = "INSERT INTO pro_products(product_name, vendor_name, product_image, product_price, product_status,product_category, 
        vendor_state, vendor_lga,  vendor_address) 
        VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->dbconn->prepare($query);
        $result = $stmt->execute([$title, $name, $newname, $price, $status, $category,$state,$lga,$address]);
        $_SESSION['admin_feedback']= "$title successfully added";
        return $result;
        echo "<pre>";
        print_r($record);
        echo "</pre>";
        }catch(PDOException $p){
            $_SESSION['admin_errormsg'] = $p->getMessage();
            return 0;
    
        }catch(Exception $e){
            $_SESSION['admin_errormsg'] = $e->getMessage();
            return 0;
        }
      
         
        }
    
    public function delete_product($id){
        $query = "DELETE FROM pro_products WHERE product_id=?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$id]);
        $res = $stmt->execute([$id]);
        return $res;
    }

   
    public function get_product_by_id($id){
        $query = "SELECT * FROM pro_products WHERE product_id=?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //a method to update product
    public function update_product($title,$name, $price, $status, $category,  $id){
        $sql = "UPDATE pro_products SET product_name =?, vendor_name=?, product_price=?, product_status=?, product_category=?,
         WHERE product_id =?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$title, $price, $status, $category, $id]);
        $res = $stmt->execute([$title, $price, $status, $category, $id]);
        return $res;
    }
    
    public function search_product(){
        if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
        $search_query = "SELECT * FROM pro_products WHERE product_name like '%$search_data_value%'";
        $stmt = $this->dbconn->prepare($search_query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

}


// $pro1 = new Product;
// var_dump($pro1->add_newproduct("Baseball cap","1","2000", "1",));

?>