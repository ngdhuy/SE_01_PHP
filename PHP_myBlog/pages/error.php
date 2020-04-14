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
        default:
            $errorMessege = "404 - Page not found";
    }
    echo "<h1 class='alert alert-danger' role='alert'>$errorMessege</h1>"
?>