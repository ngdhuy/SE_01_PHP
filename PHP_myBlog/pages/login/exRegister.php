<?php
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

        $account->register();
        
        if($account->errorID === 0)
            header('location:index.php?action=5');
        else
            header("location:index.php?action=404&id=$account->errorID");
    }
?>