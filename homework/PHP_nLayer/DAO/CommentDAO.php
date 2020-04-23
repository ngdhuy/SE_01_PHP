<?php
namespace DAO;

use Helpers\Database;

class CommentDAO extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
        parent::__destruct();
    }   

    public function getAll(){
        $query = "SELECT comment_id, comment_content ,post_id, acc_id, created_at, updated_at FROM comment";
        $this->query($query);
        $objects = $this->resultObjects();
        
        $comments = [];
        foreach($objects as $obj)
        {
            $comment = new Comment();
            $comment->comment_id = $obj->comment_id; 
            $comment->comment_content = $obj->comment_content; 
            $comment->post_id = $obj->post_id; 
            $comment->acc_id = $obj->acc_id; 
            $comment->created_at = $obj->created_at; 
            $comment->updated_at = $obj->updated_at;

            $comments[] = $comment;
        }

        return $comments;
    }


    public function getByID($id) {
        $query = "SELECT comment_id, comment_content ,post_id, acc_id, created_at, updated_at FROM comment WHERE comment_id = :comment_id";
        $this->bind("post_id", $id);
        $this->query($query);
        $obj = $this->single();
        
        $comment = new Comment();
        $comment->comment_id = $obj->comment_id; 
        $comment->comment_content = $obj->comment_content; 
        $comment->post_id = $obj->post_id; 
        $comment->acc_id = $obj->acc_id; 
        $comment->created_at = $obj->created_at; 
        $comment->updated_at = $obj->updated_at;

        return $comment;
    }

    public function getByPostID($post_id) {
        $query = "SELECT comment_id, comment_content ,post_id, acc_id, created_at, updated_at FROM comment WHERE post_id = :post_id";
        $this->bind("post_id", $post_id);
        $this->query($query);
        $objects = $this->resultObjects();
        
        $comments = [];
        foreach($objects as $obj)
        {
            $comment = new Comment();
            $comment->comment_id = $obj->comment_id; 
            $comment->comment_content = $obj->comment_content; 
            $comment->post_id = $obj->post_id; 
            $comment->acc_id = $obj->acc_id; 
            $comment->created_at = $obj->created_at; 
            $comment->updated_at = $obj->updated_at;

            $comments[] = $comment;
        }

        return $comments;
    }

    public function Insert($comment) {
        $sql = "INSERT INTO comment(comment_content, post_id, acc_id) VALUES(comment_content = :comment_content, post_id = :post_id ,acc_id = :acc_id)";
        $this->query($sql);
        $this->bind("acc_id", $comment->acc_id);
        $this->bind("post_id", $comment->post_id);
        $this->bind("acc_id", $comment->acc_id);
        $this->bind("comment_content", $comment->comment_content);
                
        return $this->execute();
    }

    public function Update($comment) {
        $sql = "UPDATE comment SET commnent_content = :commnent_content WHERE comment_id = :comment_id";
        $this->query($sql);
        $this->bind("comment_id", $comment->comment_id);
        $this->bind("comment_content", $comment->comment_content);
                
        return $this->execute();
    }

    public function Delete($comment) {
        $sql = "UPDATE FROM comment WHERE comment_id = :comment_id";
        $this->query($sql);
        $this->bind("comment_id", $comment->comment_id);
        return $this->execute();
    }
}