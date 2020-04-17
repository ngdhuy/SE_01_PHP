<?php 
    if(isset($_POST['us']) && isset($_POST['pw']))
    {
        $us = $_POST['us'];
        $pw = $_POST['pw'];

        $account = new Account();
        $account->login($us, $pw);
        
        if($account->errorID === 0)
            header('location:index.php?action=5');
        else
            header("location:index.php?action=404&id=$account->errorID");

    }
?>