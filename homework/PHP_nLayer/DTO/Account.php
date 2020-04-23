<?php 
namespace DTO;
class Account {
    private $acc_id; 
    private $username; 
    private $password;
    private $email;
    private $display_name;
    private $is_active; 
    private $created_at; 
    private $updated_at;

    public function __construct(){}

    public function __set($name, $value) {
        if(isset($this->$name))
            $this->$name = $value;
    }

    public function __get($name)
    {
        return (isset($this->$name)) ? $this->$name : null;
    }
}
?>