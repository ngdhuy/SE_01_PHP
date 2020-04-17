<?php 
    $id = 1;
    if(isset($_GET['id']))
        $id = $_GET['id'];
    
    $errorMessege = "";
    switch($id)
    {
        case 1:
            $errorMessege = "404 - Page not found";
            break;
        case 2:
            $errorMessege = "Username or password is not exists";
            break;
        case 3:
            $errorMessege = "User name is existed";
            break;
        case 4:
            $errorMessege = "Cannot create new account. Please, try again later!";
            break;
        default:
            $errorMessege = "404 - Page not found";
    }
    echo "<h1 class='alert alert-danger' role='alert'>$errorMessege</h1>"
?>