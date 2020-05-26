<?php 
namespace BUS;

use DAO\CommentDAO;

class CommentBUS {
    private $commentDAO;
    
    public function __construct(){
        $this->commentDAO = new CommentDAO();
    }

    public function __destruct(){
        unset($this->commentDAO);
    }

    public function getAll(){
        return $this->commentDAO->getAll();
    }

    public function getByID($id) {
        return $this->commentDAO->getByID($id);
    }

    public function getByPostID($id) {
        return $this->commentDAO->getByPostID($id);
    }

    public function Insert($comment) {
        return $this->commentDAO->Insert($comment);
    }

    public function Update($comment) {
        return $this->commentDAO->Update($comment);
    }

    public function Delete($comment) {
        return $this->commentDAO->Delete($comment);
    }
}