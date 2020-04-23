<?php 
namespace BUS;

use DAO\AccountDAO;
use DAO\CommentDAO;
use DAO\PostDAO;

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

    public function getByAccountID($acc_id) {
        return $this->postDAO->getByAccountID($acc_id);
    }

    public function Insert($post) {
        return $this->postDAO->Insert($post);
    }

    public function Update($post) {
        return $this->postDAO->Update($post);
    }

    public function Delete($post) {
        if($this->countComment($post) !== 0){
            $commentDAO = new CommentDAO();
            $comment = new Comment();
            $comment->post_id = $post->post_id; 
            $commentDAO->Delete($comment);

        }
        return $this->postDAO->Delete($post);
    }

    public function countComment($post){
        $commentDAO = new CommentDAO();
        return count($commentDAO->getByPostID($post->post_id));
    }
}