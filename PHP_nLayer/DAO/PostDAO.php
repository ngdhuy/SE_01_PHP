<?php
namespace DAO;

use Helpers\Database;
use DTO\Post;

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

        if($objects == null || $this->rowCount() === 0)
            return null;
        
        $posts = [];
        foreach($objects as $obj)
        {
            $post = new Post();

            $post->post_id = $obj->post_id;
            $post->acc_id = $obj->acc_id;
            $post->post_content = $obj->post_content;
            $post->created_at = $obj->created_at;
            $post->updated_at = $obj->updated_a;

            $posts[] = $post;
        }

        return $posts;
    }

    public function getByID($id) {
        $query = "SELECT post_id, acc_id, post_content, created_at, updated_at FROM post WHERE post_id = :post_id";
        $this->query($query);
        $this->bind("post_id", $id);
        $obj = $this->single();

        if($obj == null || $this->rowCount() === 0)
            return null;

        $post = new Post();

        $post->post_id = $obj->post_id;
        $post->acc_id = $obj->acc_id;
        $post->post_content = $obj->post_content;
        $post->created_at = $obj->created_at;
        $post->updated_at = $obj->updated_at;

        return $post;
    }

    public function Insert($post) {
        $query = "INSERT INTO `post`(`acc_id`, `post_content`) VALUES (:acc_id, :post_content)";
        $this->query($query);
        $this->bind("acc_id", $post->acc_id);
        $this->bind("post_content", $post->post_content);

        return $this->execute();
    }

    public function Update($post) {
        $query = "UPDATE `post` SET `acc_id`= :acc_id, `post_content`= :post_content, `created_at`= :created_at WHERE post_id = :post_id";
        $this->query($query);
        $this->bind("acc_id", $post->acc_id);
        $this->bind("post_content", $post->post_content);
        $this->bind("created_at", $post->created_at);

        $this->bind("post_id", $post->post_id);

        return $this->execute();
    }

    public function Delete($post) {
        $query = "DELETE FROM `post` WHERE post_id = :post_id";

        $this->query($query);
        $this->bind("account_id", $post->post_id);

        return $this->execute();
    }
}