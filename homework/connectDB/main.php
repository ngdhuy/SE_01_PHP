<?php
//     include("./lib/database_01.php");
        // include("./lib/database_02.php");
        // include("./lib/database_03.php");
        // include("./models/post.php");

        // $db = new Database();

        // $post = new Post();
        // var_dump($post->delete(2));
        // $sql = "SELECT account.display_name, post.content as post_content, comment.content as comment_content
        //         FROM account, post, comment
        //         WHERE account.id = post.account_id AND post.id = comment.post_id";
        
        // $db->prepare($sql);
        // $result = $db->execute();

        // $sql = "INSERT INTO se_db_blog.post (content, account_id) VALUES ('Hôm nay trời đẹp quá part 2', 1)";
        // $sql = "INSERT INTO se_db_blog.post1 (content, account_id) VALUES (?, ?)";

        // $db->prepare($sql, "si");
        // $params = ['Hôm nay trời đẹp quá part 5', 1];
        // $result = $db->execute($params);


        // $result = $db->execute($sql);
        // var_dump($result);
        // echo "<br/>". gettype($result);

        
        // var_dump($result = $db->execute($sql));
        // while($row = mysqli_fetch_array($result))
        // {
        //     extract($row);
        //     echo "<div>$display_name - $post_content - $comment_content</div>";
        // }

        // $sql = "UPDATE account SET display_name = ? WHERE id = ?";
        // $format = 'si';
        // $para = ["The BOSS", 2];

        // $db->prepare($sql, $format);
        // $result = $db->execute($para);

        // var_dump($result);

        
?>