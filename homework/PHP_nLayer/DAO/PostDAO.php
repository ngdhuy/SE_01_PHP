<?php
namespace DAO;

use Helpers\Database;

class PostDAO extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
        parent::__destruct();
    }   

    public function getAll(){
        $query = "SELECT post_id, acc_id, post_content, created_at, updated_at FROM post";
        $this->query($query);
        $objects = $this->resultObjects();
        
        $posts = [];
        foreach($objects as $obj)
        {
            $post = new Post();
            $post->post_id = $obj->post_id; 
            $post->acc_id = $obj->acc_id; 
            $post->post_content = $obj->post_content; 
            $post->created_at = $obj->created_at; 
            $post->updated_at = $obj->updated_at;

            $posts[] = $post;
        }

        return $posts;
    }

    public function getByID($id) {
        $query = "SELECT post_id, acc_id, post_content, created_at, updated_at FROM post WHERE post_id = :post_id";
        $this->bind("post_id", $id);
        $this->query($query);
        $obj = $this->single();
        
        $post = new Post();
        $post->post_id = $obj->post_id; 
        $post->acc_id = $obj->acc_id; 
        $post->post_content = $obj->post_content; 
        $post->created_at = $obj->created_at; 
        $post->updated_at = $obj->updated_at;

        return $posts;
    }

    public function getByAccountID($acc_id) {
        $query = "SELECT post_id, acc_id, post_content, created_at, updated_at FROM post WHERE acc_id = :acc_id";
        $this->bind("acc_id", $acc_id);
        $this->query($query);
        $objects = $this->resultObjects();
        
        $posts = [];
        foreach($objects as $obj)
        {
            $post = new Post();
            $post->post_id = $obj->post_id; 
            $post->acc_id = $obj->acc_id; 
            $post->post_content = $obj->post_content; 
            $post->created_at = $obj->created_at; 
            $post->updated_at = $obj->updated_at;

            $posts[] = $post;
        }

        return $posts;
    }

    public function Insert($post) {
        $sql = "INSERT INTO post(acc_id, post_content) VALUES(acc_id = :acc_id, post_content = :post_content)";
        $this->query($sql);
        $this->bind("acc_id", $post->acc_id);
        $this->bind("post_content", $post->post_content);
                
        return $this->execute();
    }

    public function Update($post) {
        $sql = "UPDATE post SET post_content = :post_content WHERE post_id = :post_id";
        $this->query($sql);
        $this->bind("post_id", $post->post_id);
        $this->bind("post_content", $post->post_content);
                
        return $this->execute();
    }

    public function Delete($post) {
        $sql = "DELETE FROM post WHERE post_id = :post_id";
        $this->query($sql);
        $this->bind("post_id", $post->post_id);
                
        return $this->execute();
    }

    
}