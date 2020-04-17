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
        include_once("./helper/database_04.php");
        
        $db = new Database();

        // $sql = "UPDATE account SET display_name = :display_name WHERE id = :id";
        // $db->query($sql);

        // $db->bind("display_name", "Mr Buoi");
        // $db->bind("id", 6);

        // $result = $db->execute();

        // $db->bind("display_name", "Mr Buoi 999");
        // $db->bind("id", 7);

        // $result = $db->execute();

        // echo "Success";

        // $sql = "SELECT * FROM account";
        // $db->query($sql);
        // $result = $db->resultObjects();

        // var_dump($result);

        $sql = "SELECT count(*) as num_account FROM account";
        $db->query($sql);
        $result = $db->single();
        echo $result->num_account;

        var_dump($result);
    ?>
</body>
</html>