<?php
    $action = 1;
    if(isset($_GET["action"]))
        $action = $_GET["action"];

    switch($action)
    {
        case 1:
            include("./GUI/pages/signIn/ui.php");
            break;
        case 2:
            include("./GUI/pages/signIn/exSignIn.php");
            break;
        case 3:
            include("./GUI/pages/signIn/exSignUp.php");
            break;
        case 4:
            include("./GUI/pages/signIn/exSignOut.php");
            break;
    }