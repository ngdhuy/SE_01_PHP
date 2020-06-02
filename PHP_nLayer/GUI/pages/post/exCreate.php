<?php
    use BUS\PostBUS;
    use DTO\Post;
    use DTO\Account;

    if(isset($_SESSION['account']) && isset($_POST["post_content"]))
    {
        $content = $_POST['post_content'];
        if(strlen($content) != 0) {
            $account = unserialize($_SESSION['account']);
            
            $post = new Post();
            $post->post_content = $content;
            $post->acc_id = $account->acc_id;
            
            $postBUS = new PostBUS();
            $postBUS->Insert($post);
        }
        header("location:index.php?page=3");
    }
    else
        header("locattion:index.php?page=404&id=5");