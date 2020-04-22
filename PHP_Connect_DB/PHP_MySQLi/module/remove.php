<?php
    include_once('../helper/database_01.php');
    $d = new Database();
    $sql = "delete from comment where post_id = '".$_GET['id']."' ";
    if($d->executeQuery($sql))
    {
        $sql = "delete from comment where id = '".$_GET['id']."' ";
        $result = $d->executeQuery($sql);
        if($result) 
            header("Location: http://localhost/SE_01_PHP/PHP_Connect_DB/PHP_MySQLi/post_comment_01.php");
        else
            echo 'UPdate fail';
            header("Location: http://localhost/SE_01_PHP/PHP_Connect_DB/PHP_MySQLi/post_comment_01.php");
    }
    