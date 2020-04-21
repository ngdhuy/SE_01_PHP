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
        return 1;
    }
}