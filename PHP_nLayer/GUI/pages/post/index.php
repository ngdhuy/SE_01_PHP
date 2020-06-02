<?php
    $action = 1;
    if(isset($_GET["action"]))
        $action = $_GET["action"];
    
    switch($action)
    {
        case 1:
            include("./GUI/pages/post/uiListOfPost.php");
            break;
        case 2:
            include("./GUI/pages/post/exCreate.php");
            break;
    }