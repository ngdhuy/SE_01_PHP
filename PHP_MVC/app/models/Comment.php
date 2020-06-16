<?php
namespace Models;
use core\Model;

class Comment extends Model{
    private $comment_id; 
    private $post_id;
    private $acc_id; 
    private $comment_content; 
    private $created_at; 
    private $updated_at;

    public function __construct (){
        $this->comment_id = 0; 
        $this->post_id = 0;
        $this->acc_id = 0; 
        $this->comment_content = ""; 
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
        return (isset($this->$name)) ? true : false;
    }
}