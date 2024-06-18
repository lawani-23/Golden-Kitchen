<?php

    error_reporting(E_ALL);
    require_once("Db.php");

    class Admin extends Db{

            private $dbconn;

    public function __construct()

    {
        $this->dbconn = $this->connect();

    }

    public function admin_logout(){
        unset($_SESSION['adminonline']);
        session_destroy();
    }

    public function admin_login($email,$password){
        try{
            $query = "SELECT * FROM admin WHERE admin_email=?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$email]);
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            if($record){

                $hashed = $record['admin_password'];
                $chk = password_verify($password,$hashed);  
                
                if($chk){
                    $_SESSION['adminonline'] = $record['admin_id'];
                    return 1;
                    
                }else{
                    $_SESSION['adminerrormsg'] = "invalid credentials";
                    return 0;
                }

            }else{
                $_SESSION['adminerrormsg'] = "invalid credentials";
                return 0;
            }

        }catch(PDOException $p){
            $_SESSION['admin_errormsg'] = $p->getmessage();
            return 0;
        }catch(Exception $e){
            $_SESSION['admin_errormsg'] = $p->getmessage();
            return 0;

        }
    }






    
    }


?>