<?php
    foreach($item->commentViewModels as $iComment)
    {
        include(ROOT."/views/comment/templateComment.php");
    }

    include(ROOT."/views/comment/uiCreate.php");
?>