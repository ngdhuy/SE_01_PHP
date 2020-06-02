<?php 
    class Account extends Database
    {
        private $acc_id; 
        private $username; 
        private $password; 
        private $display_name; 
        private $email;
        private $is_active;
        private $created_at;
        private $updated_at;

        public function __construct()
        {
            parent::__construct();
        }

        public function __get($attributeName)
        {
            return $this->$attributeName;
        }

        public function __set($attributeName, $value)
        {
            $this->$attributeName = $value;
        }

        public function Update()
        {

        }

        public function Dalete()
        {

        }

        public function Login()
        {

        }

        public function Register()
        {
            if($this->isExists())
            {
                echo "Username is exists. Please re-enter username";
                return false;
            }

            $sql = "INSERT INTO account(username, password, display_name, email) VALUES (:username, :password, :display_name, :email)";

            $this->query($sql);

            $this->bind("username", $this->username);
            $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
            $this->bind("password", $password_hash);
            $this->bind("display_name", $this->display_name);
            $this->bind("email", $this->email);

            try
            {
                $this->execute();
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
                return false;
            }

            return true;
        }

        public function isExists()
        {
            $sql = "SELECT acc_id FROM account WHERE username = :username";
            
            $this->query($sql);
            $this->bind("username", $this->username);
            $this->execute();
            $rows = $this->rowCount();

            return $rows != 0;
        }
    }
?>