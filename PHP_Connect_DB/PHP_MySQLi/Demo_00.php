<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Kết nối dữ liệu 
        $db_host = "localhost";
        $db_name = "se_db_blog";
        $db_user = "root";
        $db_pass = "root";
        $db_port = "3306";

        $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port) or die("Cannot connect to DB");
        mysqli_query( $connect, "SET NAME 'utf8'");
        
        $sql = "SELECT * FROM account";

        $result = mysqli_query($connect, $sql);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row["id"];
            $username = $row["username"];
            $display_name = $row["display_name"];

            echo "<div>$id - $username - $display_name</div>";
        }

        mysqli_close($connect);
    ?>
</body>
</html>