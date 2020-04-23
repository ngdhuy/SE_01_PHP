<?php 
namespace BUS;

use DAO\PostDAO;
use DAO\CommentDAO;

class PostBUS {
    private $postDAO;
    
    public function __construct(){
        $this->postDAO = new PostDAO();
    }

    public function __destruct(){
        unset($this->postDAO);
    }

    public function getAll(){
        return $this->postDAO->getAll();
    }

    public function getByID($id) {
        return $this->postDAO->getByID($id);
    }

    public function Insert($post) {
        return $this->postDAO->Insert($post);
    }

    public function Update($post) {
        return $this->postDAO->Update($post);
    }

    public function Delete($post) {
        return $this->postDAO->Delete($post);
    }
    
    public function countComment($post){
        $commentDAO = new CommentDAO();
        return count($commentDAO->getByIdPost($post->post_id));
    }
}