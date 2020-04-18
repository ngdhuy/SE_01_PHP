<?php 
    foreach($post->listComment as $comment)
    {
        include("./pages/comment/uiComment.php");
    }

    include ("./pages/comment/uiCreateComment.php");
?>