<?php

    error_reporting(E_ALL);

    require_once('Db.php');

    class User extends Db
    {
    
        private $dbconn;

        public function __construct()
        {
            $this->dbconn = $this->connect();
        }
       
        
        public function login($email,$password){
            try{
                $query = "SELECT * FROM user WHERE user_email = ? LIMIT 1";
                $stmt = $this->dbconn->prepare($query);
                $stmt->execute([$email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                 if($result){
                    $hashed = $result['user_password'];
                    $chk = password_verify($password,$hashed); 
                    if($chk){
                        return $result['user_id'];
                 }else{
                    $_SESSION['errormsg'] = "The password is wrong";
                    return 0;
                 }
                }else{
                    $_SESSION['errormsg'] = "invalid email";
                    return 0;
                }
            
            }catch(Exception $e){
                $_SESSION['useronline'] = $e->getMessage();
                return 0;
            }
        }
        public function update_user($fname, $lname, $phone, $email, $address, $state, $lg, $id){
            $sql = "UPDATE user SET user_fname=?, user_lname=?, user_phone=?, user_email=?
            user_address=?, user_state=?, user_lg=? WHERE user_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $ch = $stmt->execute([$fname, $lname, $phone, $email, $address, $state, $lg, $id]);
           if($ch){
            return 1;
           }else{
            return 0;
           }
        }


        public function delete_user($id){
            $sql = " DELETE FROM user WHERE user_id =? ";
            $stmt= $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$id]);
            return $resp;
        }
        

         #logout user
        public function logout(){
            session_unset();
            session_destroy();
        }

        public function fetch_user(){
            $sql = "SELECT * FROM user";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll();
            return $record;
        }

        
          public function get_user_by_id($id){
                try{
                        $query = "SELECT * FROM user WHERE user_id =? ";
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

            public function insert_user($fname, $lname, $email, $phone, $pwd){
                try{
                    #sql
                $query = "INSERT INTO user(user_fname, user_lname, user_email, user_phone, user_password) VALUES (?,?,?,?,?)";

                
                        $stmt = $this->dbconn->prepare($query);

                

                $hashed = password_hash($pwd,PASSWORD_DEFAULT);
                $result = $stmt->execute([$fname, $lname, $email, $phone, $hashed]);

              

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

            // search product
            



    }

    
?>