<?php 
    session_start();
    require_once("./config/config.php"); 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <title>My Blog</title>
</head>

<body>
    <?php require('./includes/header.php'); ?>
    <div class='container content'>
        <?php
            $action = 1;
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
            } 

            $page = '';
            switch($action)
            {
                case 1:
                    $page = "./pages/index.php";
                    break;
                case 2:
                    $page = "./pages/login/uiLogin.php";
                    break;
                case 3:
                    $page = "./pages/login/uiRegister.php";
                    break;
                case 5:
                    $page = "./pages/post/index.php";
                    break;
                case 6:
                    $page = "./pages/post/exCreatePost.php";
                    break;
                case 7:
                    $page = "./pages/comment/exCreateComment.php";
                    break;

                ///--- Execute function
                case 102:
                    $page = "./pages/login/exLogin.php";
                    break;
                case 103:
                    $page = "./pages/login/exRegister.php";
                    break;
                case 104:
                    $page = "./pages/login/exLogout.php";
                    break;

                default:
                    $page = "./pages/error.php";
                
            }
            include $page;
        ?>
    </div>
    <?php require('./includes/footer.php'); ?>
    <?php require('./includes/script'); ?>
</body>

</html>