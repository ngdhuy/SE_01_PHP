<?php
class Database 
{
    private $db_host = "localhost";
    private $db_name = "se_db_blog";
    private $db_user = "root";
    private $db_pass = "root";
    private $db_port = "3306";

    private $connect;

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
        if(mysqli_connect_error())
        {
            die("Connect Error(".mysqli_connect_errno()."): ".mysqli_connect_error());
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
        $this->connect->close();
    }

    // For SELECT query
    public function executeQuery($sql)
    {
        if($this->open())
        {
            $result = $this->connect->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        else 
        {
            return null;
        }
    }

    // For INSERT/DELETE/UPDATE query
    public function executeNonQuery($sql)
    {
        if($this->open())
        {
            $this->connect->query($sql);
        }
    }
}