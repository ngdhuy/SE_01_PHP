<?php
namespace DTO; 
class Comment{
    private $comment_id; 
    private $post_id;
    private $acc_id; 
    private $comment_content; 
    private $created_at; 
    private $updated_at;

    public function __construct (){}
    public function __set($name, $value){
        if(isset($this->$name))
            $this->$name = $value;
    }

    public function __get($name){
        return (isset($this->$name)) ? $this->$name : null;
    }
}