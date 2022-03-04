<?php

    class Login extends DB
    {
    
        public string $email;
        public string $password;
        public string $status;

        public function __construct($email, $password)
        {
        
            $this->email = $email;
            $this->password = $password;
            ;
        }

        public function authenticate(){
            $sql = "SELECT * FROM users 
                    WHERE email = '".$this->email."' AND password = '" .$this->password."'";
            $stmt = DB::getInstance()->prepare($sql);
            $stmt->execute();
            $rsult = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
            
        }
        public static function error($msg){
            return $msg;
        }
    }