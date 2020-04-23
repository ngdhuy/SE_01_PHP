<?php
namespace Helpers;

use PDO;
use PDOException;
use Config\Configuration;

class Database {
    private $db_host = Configuration::SYS['DB_HOST'];
    private $db_name = Configuration::SYS['DB_NAME'];
    private $db_user = Configuration::SYS['DB_USER'];
    private $db_pass = Configuration::SYS['DB_PASS'];
    private $db_port = Configuration::SYS['DB_PORT'];


    private $connect;
    private $stmt;
    private $error;

    private $connection_string;
    private $driver_options;

    public function __construct()
    {
        $this->connection_string = "mysql:host=$this->db_host;dbname=$this->db_name";
        $this->driver_options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try
        {
            $this->connect = new PDO($this->connection_string, $this->db_user, $this->db_pass, $this->driver_options);
        } 
        catch(PDOException $e) 
        { 
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function __destruct()
    {
        $this->connect = null;
    }

    public function query($sql)
    {
        $this->stmt = $this->connect->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if(is_null($type))
        {
            switch (true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
                break;
            }
        }

        // bind values
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    // get multiple rows
    public function resultObjects() 
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // get single row
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}