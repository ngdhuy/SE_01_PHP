<?php
class Database 
{
    private $db_host = "localhost";
    private $db_name = "se_db_blog";
    private $db_user = "root";
    private $db_pass = "root";
    private $db_port = "3306";

    private $mysqli;
    private $stmt;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port);
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
            $this->mysqli->query("SET name 'utf8'");
            return true;
        }
    }

    public function close()
    {
        $this->mysqli->close();
    }

    // For SELECT query
    public function prepare($sql, $format = "")
    {
        if($this->open())
        {
            $this->format = $format;
            $this->stmt = $this->mysqli->prepare($sql);
        }
        else 
        {
            return null;
        }
    }

    public function execute($parameters = [])
    {
        if(strlen($this->format) > 0)
            $this->stmt->bind_param($this->format, ...$parameters);

        if($this->stmt->execute())
        {
            $result = $this->stmt->get_result();
            if($result == true)
                return $result->fetch_all(MYSQLI_ASSOC);
            else 
                return true;
        }
        else
        {
            return null;
        }
    }
}