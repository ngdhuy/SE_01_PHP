<?php 
namespace BUS;

use DAO\AccountDAO;
use DAO\CommentDAO;
use DAO\PostDAO;

class AccountBUS {
    private $accountDAO;
    
    public function __construct(){
        $this->accountDAO = new AccountDAO();
    }

    public function __destruct(){
        unset($this->accountDAO);
    }

    public function getAll(){
        return $this->accountDAO->getAll();
    }

    public function getByID($id) {
        return $this->accountDAO->getByID($id);
    }

    public function Insert($account) {
        return $this->accountDAO->Insert($account);
    }

    public function Update($account) {
        return $this->accountDAO->Update($account);
    }

    public function Delete($account) {
        if($this->countPost($account) === 0 && $this->countComment($account) === 0)
            return $this->accountDAO->Delete($account);
        else {
            $account->is_active = false;
            return $this->accountDAO->Update($account);
        }
    }

    public function countPost($account){
        $postDAO = new PostDAO();
        return count($postDAO->getAll());
    }
    
    public function countComment($account){
        $commentDAO = new CommentDAO();
        return count($commentDAO->getAll());
    }

    public function login($username, $password){
        $account = $this->accountDAO->checkAccountExist($username);
        if($account == null)
            return null;
        else {
            if(password_verify($password, $account->password))
                return $account;
            else
                return null;
        }
    }
}