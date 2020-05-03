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
        $query = "SELECT acc_id, username, password, email, display_name, is_active, created_at, updated_at FROM account";
        $this->query($query);
        $objects = $this->resultObjects();

        if($objects == null || $this->rowCount() === 0)
            return null;
        
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
            var_dump($acc);
            echo "<hr />";
            $accounts[] = $acc;
        }
        return $accounts;
    }

    public function getByID($id) {
        $query = "SELECT acc_id, username, password, email, display_name, is_active, created_at, updated_at FROM account WHERE acc_id = :acc_id";
        $this->query($query);
        $this->bind("acc_id", $id);
        $obj = $this->single();

        if($obj == null || $this->rowCount() === 0)
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
        $query = "INSERT INTO `account`(`username`, `password`, `display_name`, `email`, `is_active`) VALUES (:username, :password, :display_name, :email, :is_active)";
        $this->query($query);
        $this->bind("username", $account->username);
        $this->bind("password", $account->password);
        $this->bind("display_name", $account->display_name);
        $this->bind("email", $account->email);
        $this->bind("is_active", $account->is_active);

        return $this->execute();
    }

    public function Update($account) {
        $query = "UPDATE `account` SET `username`= :username,`password`= :password,`display_name`= :display_name,`email`= :email,`is_active`= :is_active, `created_at`= :created_at WHERE acc_id = :acc_id";
        $this->query($query);
        $this->bind("username", $account->username);
        $this->bind("password", $account->password);
        $this->bind("display_name", $account->display_name);
        $this->bind("email", $account->email);
        $this->bind("is_active", $account->is_active);
        $this->bind("created_at", $account->created_at);
        $this->bind("acc_id", $account->acc_id);

        return $this->execute();
    }

    public function Delete($account) {
        $query = "DELETE FROM `account` WHERE acc_id = :account_id";

        $this->query($query);
        $this->bind("account_id", $account->acc_id);

        return $this->execute();
    }

    public function checkAccountExist($username) {
        $query = "SElECT acc_id, username, password, display_name, email, is_active, created_at, updated_at FROM account WHERE username = :username";
        $this->query($query);
        $this->bind("username", $username);

        $object = $this->single();
        if($object == null)
            return null;
        else {
            $account = new Account();
            $account->acc_id = $object->acc_id;
            $account->username = $object->username;
            $account->password = $object->password;
            $account->display_name = $object->display_name;
            $account->email = $object->email;
            $account->is_active = $object->is_active;
            $account->created_at = $object->created_at;
            $account->updated_at = $object->updated_at;

            return $account;
        }
    }
}