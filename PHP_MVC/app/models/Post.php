<?php
namespace Models;
use core\Model;

class Post extends Model{
    private $post_id; 
    private $acc_id; 
    private $post_content; 
    private $created_at; 
    private $updated_at;

    public function __construct (){
        $this->post_id = 0;
        $this->acc_id = 0; 
        $this->post_content = ""; 
        $this->created_at = ""; 
        $this->updated_at = "";
    }

    public function __set($name, $value){
        if(isset($this->$name))
            $this->$name = $value;
    }

    public function __get($name){
        return (isset($this->$name)) ? $this->$name : null;
    }

    public function __isset($name)
    {   
        return isset($this->$name);
    }
}