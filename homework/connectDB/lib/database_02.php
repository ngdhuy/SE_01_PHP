<?php
    //Phong cách hướng đối tượng
    class Database
    {
        private $connect; //Object(Mysqli)

        private $db_host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "se_db_blog";
        private $db_port = "3306";

        public function __construct()
        {
            $this->connect = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port); 
        }

        public function __destruct()
        {
            $this->close();
        }

        public function open()
        {
            if (mysqli_connect_error()) {
                die('Connect Error (' . mysqli_connect_errno() . ') '
                        . mysqli_connect_error());
                return false;
            }
            else
            {
                $this->connect->query("SET name 'utf8'");
                return true;
            }                           
        }

        public function close()
        {
            if ($this->open())
                $this->connect->close();
        }

        public function execute($sql)
        {
            if ($this->open())
            {
                $result = $this->connect->query($sql);
                if (!is_bool($result))
                    return $result->fetch_all(MYSQLI_ASSOC); //fetch về 1 một mảng các đối tượng
                return $result;
            }
            return null;
        }       
    }
?>

