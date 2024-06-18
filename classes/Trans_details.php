<?php

require_once "Db.php";

class Trans_details extends Db{

private $dbconn ;
public function __construct(){

    $this->dbconn = $this->connect();
}




public function fetch_trans_details(){
    $sql = "SELECT * FROM trans_details";
    $stmt = $this->dbconn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    return $record;
}

public function get_trans_details_by_id(){
    $sql = "SELECT * FROM trans_details";
    $stmt = $this->dbconn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    return $record;
}

public function delete_trans_details($id){
    $query = "DELETE FROM trans_details WHERE det_id=?";
    $stmt = $this->dbconn->prepare($query);
    $stmt->execute([$id]);
    $res = $stmt->execute([$id]);
    return $res;
}



}

?>