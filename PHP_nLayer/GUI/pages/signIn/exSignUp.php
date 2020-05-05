<?php
    use BUS\AccountBUS;
    use DTO\Account;

    if(isset($_POST['us']) && isset($_POST['pw']) && isset($_POST['dn']) && isset($_POST['email']))
    {
        $us = $_POST['us'];
        $pw = $_POST['pw'];
        $dn = $_POST['dn'];
        $email = $_POST['email'];

        $account = new Account();
        $account->username = $us; 
        $account->password = $pw;
        $account->display_name = $dn; 
        $account->email = $email;

        $accountBUS = new AccountBUS();
        
        $acc = $accountBUS->register($account);

        if($acc == false)
            header('location:index.php?page=404&id=3');
        else if ($acc == null)
            header('location:index.php?page=404&id=4');
        else
        {
            $_SESSION["account"] = serialize($acc);
            header("location:index.php");
        }
    }