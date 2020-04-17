<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('./config/config.php');
        require_once('./Helper/Database.php');
        require_once('./Model/Account.php');

        $acc = new Account();

        $acc->username = "supperuser";
        $acc->password = "123456";
        $acc->display_name = "Mr Suppert User";
        $acc->email = 'supperusert@gmail.com';

        if($acc->Register())
            echo "Success";
    ?>
</body>
</html>