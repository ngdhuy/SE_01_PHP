<?php
    use BUS\AccountBUS;
    use DTO\Account;

    if(isset($_POST['us']) && isset($_POST['pw'])){
        $us = $_POST['us'];
        $pw = $_POST['pw'];

        $accountBUS = new AccountBUS();
        $account = $accountBUS->login($us, $pw);
        
        if($account == null)
            header("location:index.php?page=404&id=2");
        else {
            $_SESSION["account"] = serialize($account);
            header("location:index.php");
        }
            
    } else {
        header("location:index.php");
    }