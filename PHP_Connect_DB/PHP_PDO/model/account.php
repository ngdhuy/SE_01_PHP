<?php
    class account extends Database
    {
        private $id; 
        private $username; 
        private $password; 
        private $display_name;

        public function __construct()
        {
            parent::__construct();

            $this->id = 0; 
            $this->username = "";
            $this->password = "";
            $this->display_name = "";
        }

        public function __get($attribute)
        {
            return $this->$attribute;
        }

        public function __set($attribute, $value)
        {
            $this->$attribute = $value;
        }

        public function parseAccount($stdClass)
        {
            $this->id = $stdClass->id;
            $this->username = $stdClass->username;
            $this->password = $stdClass->password;
            $this->display_name = $stdClass->display_name;
        }

        public function toString()
        {
            return "$this->id. $this->username - $this->password - $this->display_name";
        }

        public function getAll()
        {
            $sql = "SELECT id, username, password, display_name FROM account";
            $this->query($sql);

            $result = $this->resultObjects();


            $accounts = [];
            foreach($result as $item)
            {
                $account = new account();
                $account->parseAccount($item);

                $accounts[] = $account;
            }

            return $accounts;
        }

        public function Insert()
        {
            $sql = "INSERT INTO account (username, password, display_name) VALUE(:username, :password, :display_name)";
            $this->query($sql);
            $this->bind("username", $this->username);
            $this->bind("password", $this->password);
            $this->bind("display_name", $this->display_name);
            $this->execute();

            $sql = "SELECT id FROM account ORDER BY id DESC LIMIT 0, 1";
            $this->query($sql);
            $result = $this->single();
            $this->id = $result->id;
        }

        public function Update()
        {
            $sql = "UPDATE account SET username = :username, password = :password, display_name = :display_name WHERE id = :id";
            $this->query($sql);
            $this->bind("id", $this->id);
            $this->bind("username", $this->username);
            $this->bind("password", $this->password);
            $this->bind("display_name", $this->display_name);
            $this->execute();
        }

        public function Delete()
        {
            $flag = true;

            // check post of account
            $sql = "SELECT * FROM post WHERE account_id = :acc_id";
            $this->query($sql);
            $this->execute();
            if ($this->rowCount() > 0)
                $flag = false;

            
            if($flag)
            {
                $sql = "DELETE FROM account WHERE id = :id";
                $this->query($sql);
                $this->bind("id", $this->id);
                $this->execute();
            }
            else 
            {
                echo "<div>Cannot delete this account</div>";
            }
        }
    }
?>