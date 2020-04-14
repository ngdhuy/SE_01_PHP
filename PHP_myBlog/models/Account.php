<?php 
    class Account
    {
        private $acc_id; 
        private $username; 
        private $password;
        private $display_name; 
        private $email;
        private $is_active;

        private $errorID = 0;
        
        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function login($us, $pw)
        {
            $db = new Database();

            $sql = "SElECT acc_id, username, password, display_name, email, is_active FROM account WHERE username = :username";
            $db->query($sql);
            $db->bind("username", $us);

            $object = $db ->single();
            
            if($object == null)
            {
                $this->errorID = 2;
            }
            else 
            {
                if(password_verify($pw, $object->password))
                {
                    $this->acc_id = $object->acc_id;
                    $this->username = $object->username;
                    $this->password = $object->password;
                    $this->display_name = $object->display_name;
                    $this->email = $object->email;
                    $this->is_active = $object->is_active;

                    $_SESSION['account'] = serialize($this);
                }
                else 
                {
                    // Password is not match
                    $this->errorID = 2;
                }
            }

            unset($db);
        }
    }
?>