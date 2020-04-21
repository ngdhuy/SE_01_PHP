<?php 
namespace DAO;
use Helpers\Database;
use DTO\Account;

class AccountDAO extends Database {
    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
        parent::__destruct();
    }

    public function getAll(){
        $query = "SELECT acc_id, username, password, email, diplay_name, is_active, created_at, updated_at FROM account";
        $this->query($query);
        $objects = $this->resultObjects();
        
        $accounts = [];
        foreach($objects as $obj)
        {
            $acc = new Account();
            $acc->acc_id = $obj->acc_id; 
            $acc->username = $obj->username;
            $acc->password = $obj->password;
            $acc->email = $obj->email;
            $acc->display_name = $obj->display_name;
            $acc->is_active = $obj->is_active;
            $acc->created_at = $obj->created_at; 
            $acc->updated_at = $obj->updated_at;

            $accounts[] = $acc;
        }

        return $accounts;
    }

    public function getByID($id) {
        $query = "SELECT acc_id, username, password, email, diplay_name, is_active, created_at, updated_at FROM account WHERE acc_id = :acc_id";
        $this->bind("acc_id", $id);
        $this->query($query);
        $obj = $this->single();

        if($obj == null || $this->rowCount === 0)
            return null;

        $acc = new Account();
        $acc->acc_id = $obj->acc_id; 
        $acc->username = $obj->username;
        $acc->password = $obj->password;
        $acc->email = $obj->email;
        $acc->display_name = $obj->display_name;
        $acc->is_active = $obj->is_active;
        $acc->created_at = $obj->created_at; 
        $acc->updated_at = $obj->updated_at;

        return $acc;
    }

    public function Insert($account) {
        return true;
    }

    public function Update($account) {
        return true;
    }

    public function Delete($account) {
        
    }
}