<?php

require_once "Db.php";

class Transaction extends Db{

private $dbconn ;
public function __construct(){

    $this->dbconn = $this->connect();
}

public function get_product_price($id){
    $query = "SELECT product_price FROM pro_products WHERE product_id=?";
    $stmt = $this->dbconn->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetCh(PDO::FETCH_ASSOC);
    $amt = $result['product_price'];
    return $amt ;
}


public function get_transaction_amt($ref){
    $query = "SELECT trans_totamt FROM transaction WHERE trans_ref=?";
    $stmt = $this->dbconn->prepare($query);
    $stmt->execute([$ref]);
    $result = $stmt->fetCh(PDO::FETCH_ASSOC);
    $amt = $result['trans_totamt'];
    return $amt ;
}

        public function get_transaction_byref($ref){
            $query = "SELECT* FROM transaction JOIN  trans_details ON trans_id=det_transid
             JOIN pro_products ON  trans_details. product_id= pro_products.product_id WHERE trans_ref=?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$ref]);
            $result = $stmt->fetCh(PDO::FETCH_ASSOC);
            return $result ;
                

        }




public function insert_transaction($ref , $userid, $cart_items ){
    $query = "INSERT INTO transaction(trans_ref, trans_by) VALUES(?,?)";
    $stmt = $this->dbconn->prepare($query);
    $stmt->execute([$ref,$userid]);
    $id = $this->dbconn->lastInsertId(); 

    // insert into the transaction table
    $amount = 0;
    foreach($cart_items as $productid => $qty){
        $product_price = $this->get_product_price($productid);
        $query2 = "INSERT INTO trans_details(product_id, det_amt, det_transid, det_qty) VALUES (?,?,?,?)";
        $stmt2 = $this->dbconn->prepare($query2);
        $stmt2->execute([$productid, $product_price, $id, $qty]);
        $amount = $amount + $product_price * $qty ;

    }
    $query3 = "UPDATE transaction SET trans_totamt = ? WHERE trans_id=? ";
    $stmt3 = $this->dbconn->prepare($query3);
    $stmt3->execute([$amount,$id]); 
    return $id ;

}

public function fetch_transaction(){
    $sql = "SELECT * FROM transaction";
    $stmt = $this->dbconn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    return $record;
}

public function get_transaction_by_id(){
    $sql = "SELECT * FROM transaction";
    $stmt = $this->dbconn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    return $record;
}

public function delete_transaction($id){
    $query = "DELETE FROM transaction WHERE trans_id=?";
    $stmt = $this->dbconn->prepare($query);
    $stmt->execute([$id]);
    $res = $stmt->execute([$id]);
    return $res;
}






}

?>