<?php
namespace DAO;

use Helpers\Database;
use Models\Comment;

class CommentDAO extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
        parent::__destruct();
    }   

    public function getAll(){
        $query = "SELECT `comment_id`, `comment_content`, `post_id`, `acc_id`, `created_at`, `updated_at` FROM `comment` ORDER BY created_at";
        $this->query($query);
        $objects = $this->resultObjects();
        
        if($objects == null || $this->rowCount() === 0)
            return null;

        $comments = [];
        foreach($objects as $obj)
        {
            $cmt = new Comment();

            $cmt->comment_id = $obj->comment_id;
            $cmt->post_id = $obj->post_id;
            $cmt->acc_id = $obj->acc_id;
            $cmt->comment_content = $obj->comment_content;
            $cmt->created_at = $obj->created_at;
            $cmt->updated_at = $obj->updated_at;

            $comments[] = $cmt;
        }

        return $comments;
    }

    public function getByID($id) {
        $query = "SELECT `comment_id`, `comment_content`, `post_id`, `acc_id`, `created_at`, `updated_at` FROM `comment` WHERE comment_id = :comment_id";
        $this->query($query);
        $this->bind("comment_id", $id);
        $obj = $this->single();

        if($obj == null || $this->rowCount() === 0)
            return null;

        $cmt = new Comment();
        $cmt->comment_id = $obj->comment_id;
        $cmt->post_id = $obj->post_id;
        $cmt->acc_id = $obj->acc_id;
        $cmt->comment_content = $obj->comment_content;
        $cmt->created_at = $obj->created_at;
        $cmt->updated_at = $obj->updated_at;

        return $cmt;
    }

    public function getByPostID($id_post){
        $query = "SELECT `comment_id`, `comment_content`, `post_id`, `acc_id`, `created_at`, `updated_at` FROM `comment` WHERE post_id = :post_id";
        $this->query($query);
        $this->bind("post_id", $id_post);
        $objects = $this->resultObjects();

        if($objects == null || $this->rowCount() === 0)
            return null;

        $comments = [];
        foreach($objects as $obj)
        {
            $cmt = new Comment();

            $cmt->comment_id = $obj->comment_id;
            $cmt->post_id = $obj->post_id;
            $cmt->acc_id = $obj->acc_id;
            $cmt->comment_content = $obj->comment_content;
            $cmt->created_at = $obj->created_at;
            $cmt->updated_at = $obj->updated_at;

            $comments[] = $cmt;
        }

        return $comments;
    }

    public function Insert($comment) {
        $query = "INSERT INTO `comment`(`comment_content`, `post_id`, `acc_id`) VALUES (:comment_content, :post_id, :acc_id)";
        $this->query($query);
        $this->bind("comment_content", $comment->comment_content);
        $this->bind("post_id", $comment->post_id);
        $this->bind("acc_id", $comment->acc_id);

        return $this->execute();
    }

    public function Update($comment) {
        $query = "UPDATE `comment` SET `comment_content`= :comment_content,`post_id`= :post_id,`acc_id`= :acc_id,`created_at`= :created_at WHERE comment_id = :comment_id";
        $this->query($query);
        $this->bind("comment_content", $comment->comment_content);
        $this->bind("post_id", $comment->post_id);
        $this->bind("acc_id", $comment->acc_id);
        $this->bind("created_at", $comment->created_at);
        $this->bind("comment_id", $comment->comment_id);

        return $this->execute();
    }

    public function Delete($comment) {
        $query = "DELETE FROM `comment` WHERE comment_id = :comment_id";

        $this->query($query);
        $this->bind("comment_id", $comment->comment_id);

        return $this->execute();
    }
}