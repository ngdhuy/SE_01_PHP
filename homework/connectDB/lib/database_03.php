<?php
    //Phong cách hướng đối tượng
    class Database
    {
        private $connect; //Object(Mysqli)
        private $stmt;
        private $format;

        private $db_host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "se_db_blog";
        private $db_port = "3306";

        public function __construct()
        {
            $this->connect = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port); 
            $this->stmt = $this->connect->stmt_init();
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

        public function prepare($sql, $format = "")
        {
            if ($this->open())
            {
                $this->stmt = $this->connect->prepare($sql);
                $this->format = $format;
            }
            return null;
        }

        public function execute($parameters = [])
        {
            if ($this->open())
            {  
                if (!empty($this->format))
                    $this->stmt->bind_param($this->format, ...$parameters); //Cứ bị văng lỗi ở đây nếu truy vấn không đúng   
                if ($this->stmt->execute())
                {
                    $result = $this->stmt->get_result();
                    if (!is_bool($result))      
                        return $result->fetch_all(MYSQLI_ASSOC); 
                    else
                        return true;     
                }                        
            }
            return null;
        }       
    }
?>

