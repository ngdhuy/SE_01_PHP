<?php
    include("../lib/database_01.php");
    include("../models/account.php");

    if (isset($_POST["yourID"]))
    {
        $id = $_POST["yourID"];
        $account = new Account();
        if($account->login($id))
            header("Location:../index.php");
        else
            header("Location:../index.php?action=2");
    }
?>