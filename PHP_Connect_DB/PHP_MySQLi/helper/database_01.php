<?php
class Database 
{
    private $db_host = "localhost";
    private $db_name = "se_db_blog";
    private $db_user = "root";
    private $db_pass = "";
    private $db_port = "3306";

    private $connect;

    public function __construct()
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
        else 
        {
            return false;
        }
    }

    public function close()
    {
        mysqli_close($this->connect);
    }

    public function executeQuery($sql)
    {
        if($this->open())
        {
            $result = mysqli_query($this->connect, $sql);
            return $result;
        }
        else 
        {
            return null;
        }
    }

    public function insertID(){
        $last_id = mysqli_insert_id($this->connect);
        return $last_id;
    }


}