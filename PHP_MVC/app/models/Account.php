<?php 
namespace Models;
use core\Model;

class Account extends Model {
    private $acc_id; 
    private $username; 
    private $password;
    private $email;
    private $display_name;
    private $is_active; 
    private $created_at; 
    private $updated_at;

    public function __construct(){
        $this->acc_id = 0; 
        $this->username = ""; 
        $this->password = "";
        $this->email = "";
        $this->display_name = "";
        $this->is_active = true; 
        $this->created_at = ""; 
        $this->updated_at = "";
    }

    public function __set($name, $value) {
        if(isset($this->$name))
            $this->$name = $value;
    }

    public function __get($name)
    {
        return (isset($this->$name)) ? $this->$name : null;
    }

    public function __isset($name)
    {
        return (isset($this->$name)) ? true : false;
    }
}
?>