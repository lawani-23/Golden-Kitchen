<?php

    error_reporting(E_ALL);

    require_once('Db.php');

    class Vendor extends Db
    {
    
        private $dbconn;

        public function __construct()
        {
            $this->dbconn = $this->connect();
        }
       
        
        public function login ($email,$password){
            try{
                $query = "SELECT * FROM vendor WHERE vendor_email =? ";
                $stmt = $this->dbconn->prepare($query);
                $stmt->execute([$email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
               
                 if($result){
                    $hashed = $result['vendor_password'];
                    $chk = password_verify($password,$hashed);
                   
                    if($chk){
                        return $result['vendor_id'];
                 }else{
                    $_SESSION['errormsg'] = "The password is wrong";
                    return 0;
                 }
                }else{
                    $_SESSION['errormsg'] = "invalid email";
                    return 0;
                }
            
            }catch(Exception $e){
                $_SESSION['vendoronline'] = $e->getMessage();
                return 0;
            }
        }
        public function delete_vendor($id){
            $sql = " DELETE FROM vendor WHERE vendor_id =?";
            $stmt= $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$id]);
            return $resp;
        }

         
        public function logout(){
            session_unset();
            session_destroy();
        }

        public function fetch_vendor(){
            $sql = "SELECT * FROM vendor";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll();
            return $record;
        }
        public function fetch_vendor_by_id($id){
            $sql = "SELECT * FROM vendor";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll();
            return $record;
        }


        
        public function update_vendor($cname, $lname, $phone, $email, $id){
            $sql = "UPDATE vendor SET vendor_cname=?, vendor_fname=?, vendor_phone=?, vendor_email=? WHERE vendor_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $ch = $stmt->execute([$cname, $fname, $phone, $email, $id]);
           if($ch){
            return 1;
           }else{
            return 0;
           }
        }
      
          public function get_vendor_by_id($id){
                try{
                        $query = "SELECT * FROM vendor WHERE vendor_id =?";
                        $stmt = $this->dbconn->prepare($query);
                        $stmt->execute([$id]);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $result;
            
                }catch(PDOException $e){ 
                    $_SESSION['errormsg'] = $e->getmessage();
                    return 0;

                }catch(Exception $e){
                    $_SESSION['errormsg'] = $e->getmessage();
                    return 0;
                   }
            }

            public function insert_vendor($cname, $fname, $email, $phone, $pwd){
                try{
                   
                $query = "INSERT INTO vendor(vendor_cname, vendor_fname, vendor_email, vendor_phone, vendor_password) VALUES (?,?,?,?,?)";

                
                        $stmt = $this->dbconn->prepare($query);

              

                $hashed = password_hash($pwd,PASSWORD_DEFAULT);
                $result = $stmt->execute([$cname, $fname, $email, $phone, $hashed]);

        

                $id = $this->dbconn->lastInsertId();
                return $id;
                }catch(PDOException $e){
                    $_SESSION['errormsg'] = $e->getmessage();
                    return 0;

                }catch(Exception $e){
                  
                    $_SESSION['errormsg'] = $e->getmessage();
                    return 0;

                }
                

            }
    }

    // $ven = new Vendor;
    // $res = $ven->login("mydog@gmail.com","1234");
?>