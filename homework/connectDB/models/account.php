<?php
    session_start();

    class Account extends Database
    {
        private $id;
        private $username;
        private $password;
        private $display_name;

        // public function __construct($id, $username, $password, $displayName)
        // {
        //     $this->id = $id;
        //     $this->username = $username;
        //     $this->password = $password;
        //     $this->displayName = $displayName;
        // }

        public function __get($attributeName)
        {
            if (isset($this->$attributeName))
                return $this->$attributeName;
            return null;
        }

        public function __set($attributeName, $value)
        {
            if (isset($this->$attributeName))
            {
                $this->$attributeName = $value;
                return true;
            }
            return false;
        }

        public function login($id)
        {
            $sql = "SELECT a.id, a.username, a.password, a.display_name 
                    FROM account a 
                    WHERE a.id = $id";
            $result = $this->execute($sql);

            if (is_bool($result))
            {
                $_SESSION["error"] = "ID not exists";
                return false; //ID không tồn tại              
            }           
            else
            {
                foreach ($result as $rs)
                {
                    $this->id = $rs["id"];
                    $this->username = $rs["username"];
                    $this->password = $rs["password"];
                    $this->display_name = $rs["display_name"];
                }
                $_SESSION["account"] = serialize($this); //Đóng gói lại và gửi thông qua session
                return true; //ID tồn tại
            }          
        } 
        
        public function postList($id)
        {   
             //================DB 01 02====================
            $sql = "    SELECT id ,content, title_post
                        FROM post 
                        WHERE account_id = $id 
                        LIMIT 3";
             return $this->execute($sql);
            //================DB 03====================
            // $params = [$id];
            // $sql = "    SELECT id ,content, title_post
            //                FROM post 
            //                WHERE account_id = ? ";
            // $this->prepare($sql, "i");
            // return $this->execute($params);
        }

    }
?>