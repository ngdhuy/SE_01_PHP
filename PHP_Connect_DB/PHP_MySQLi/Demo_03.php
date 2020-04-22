<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("./helper/database_03.php");
        $db = new Database();

        
        
        // $sql = "INSERT INTO account(username, password, display_name) VALUES (?, ?, ?)";
        // $format = "sss";
        // $param = ["", "", ""];

        // $db->prepare($sql, $format);
        
        // $param[0] = "tun";
        // $param[1] = "456";
        // $param[2] = "Mr Tun";

        // $db->execute($param);

        // $param[0] = "a_ly";
        // $param[1] = "456";
        // $param[2] = "Mr A Lỳ";

        // $db->execute($param);

        // $sql = "SELECT * FROM post";
        // $db->prepare($sql);
        // $result = $db->execute();
        // var_dump($result);

        $sql = "UPDATE account SET display_name = ? WHERE id = ?";
        $format = 'si';
        $para = ["The BOSS", 4];

        $db->prepare($sql, $format);
        $result = $db->execute($para);

        var_dump($result);

        echo "Success";
    ?>
</body>
</html>