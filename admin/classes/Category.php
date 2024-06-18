<?php
error_reporting(E_ALL);

   require_once "Db.php";

   class Category extends Db{
     private $dbconn;

     public function __construct(){
        $this->dbconn = $this->connect();
     }

     public function fetch_categories(){
        $sql = "SELECT * FROM category";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
     }

     public function insert_categories(){
         $quary = "INSERT INTO category(category_name) VALUES (?)";
         $stmt = $this->dbconn->prepare($query);
         $result = $stmt->execute([$title]);
         if($result){
            echo "<script> alert('category has been added successfully')</script>";
         }
         return $result;
     }

     
   }

   //$res = new Category;
   // var_dump($res->get_category_get_all_category_by_id)
?>