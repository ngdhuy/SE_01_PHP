<?php
    if(isset($_SESSION['account']) && isset($_POST["post_content"]))
    {
        $content = $_POST['post_content'];
        if(strlen($content) != 0) {
            $acount = unserialize($_SESSION['account']);
            
            $post = new Post();
            $post->post_content = $content;
            $post->acc_id = $account->acc_id;
            $post->Create();
        }
        header("location:index.php?action=5");
    }
    else
        header("locattion:index.php?action=404&id=5");
?>