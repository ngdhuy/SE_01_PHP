<?php
    if(isset($_SESSION["account"]) && isset($_POST["comment_content"]))
    {
        $content = $_POST["comment_content"];
        if(strlen($content) != 0)
        {
            $account = unserialize($_SESSION["account"]);
            $post_id = $_POST["post_id"];

            $comment = new Comment();

            $comment->acc_id = $account->acc_id;
            $comment->comment_content = $content;
            $comment->post_id = $post_id;

            $comment->Create();
        }
        header("location:index.php?action=5");
    }
    else
        header("location:index.php?action=404&id=6");

?>