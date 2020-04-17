<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>List of Account</h1>
    <?php
        require_once("./config/config.php");
        require_once("./helper/database_04.php");
        require_once("./model/account.php");

        $acc = new account();

        $acc->username = "Hello";
        $acc->password = "world";
        $acc->display_name = "Trùm cuối";
        $acc->insert();

        echo "<h1>$acc->id</h1>";

        $lstAcc = $acc->getAll();

        foreach($lstAcc as $a)
        {
            $s = $a->toString();
            echo "<div>$s</div>";
        }
    ?>
</body>
</html>