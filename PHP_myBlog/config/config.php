<?php
    // -- Databse config
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'se_db_myblog');
    define('DB_PORT', 3306);
    define('DB_TYPE', 'MYSQLIDB');

    // -- URL config
    define('BASE_URL', '/php_myblog/');
    define('CONFIG', BASE_URL.'config/config.php');
    
    // --- Include Library
    include("./Helper/Database.php");

    // --- Include Models
    include("./models/Account.php");
    include("./models/Post.php");
    include("./models/Comment.php");
?>