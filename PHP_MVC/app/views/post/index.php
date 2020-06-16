<h1>List of Post</h1>

<?php
    include(ROOT."/views/post/uiCreate.php");

    foreach($listOfPostViewModel as $item)
    {
        include(ROOT."/views/post/templatePost.php");
    }
?>