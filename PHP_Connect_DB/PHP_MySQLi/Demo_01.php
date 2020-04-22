<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("./helper/database_01.php");
        $db = new Database();
        $sql = "SELECT account.display_name, post.content as post_content, comment.content as comment_content
                FROM account, post, comment
                WHERE account.id = post.account_id AND post.id = comment.post_id";
        
        $result = $db->executeQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            extract($row);
            echo "<div>$display_name - $post_content - $comment_content</div>";
        }
    ?>
</body>
</html>