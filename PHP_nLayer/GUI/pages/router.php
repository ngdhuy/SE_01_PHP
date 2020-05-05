<?php
    $page = 1; 
    if(isset($_GET["page"]))
        $page = $_GET["page"];

    switch($page)
    {
        case 1:
            include("./GUI/pages/index/index.php");
            break;
        case 2: 
            include("./GUI/pages/signIn/index.php");
            break;
        case 3:
            include("./GUI/pages/post/index.php");
            break;
        default:
            include("./GUI/pages/error/index.php");
    }