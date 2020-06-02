<?php
    session_start();
    define("WEBROOT", str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
    define("ROOT", str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"])."app/");

    require(ROOT."config/core.php");
    
    require(ROOT."router.php");
    require(ROOT."request.php");
    require(ROOT."dispatcher.php");

    $dispatch = new Dispatcher();
    $dispatch->dispatch();
?>