<?php
    //Phong cách thủ tục
    class Database
    {
        private $connect; //Object(Mysqli)

        private $db_host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "se_db_blog";
        private $db_port = "3306";

        public function __constructor()
        {
        }

        public function open()
        {
            $this->connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port)
                                or die("Cannot connect to Database");
            if($this->connect)
            {
                mysqli_query($this->connect, "SET name 'utf8'");
                return true;
            }
            return false;                  
        }

        public function close()
        {
            if ($this->open())
                mysqli_close($this->connect);
        }

        public function execute($sql)
        {
            if ($this->open())
            {
                $result = mysqli_query($this->connect, $sql);
                $this->close();
                if (!is_bool($result))
                    return $result->fetch_all(MYSQLI_ASSOC); //fetch về 1 một mảng các đối tượng
            }
            return $result;
        }       
    }
?>

