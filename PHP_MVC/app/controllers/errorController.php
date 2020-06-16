<?php
    class errorController extends Controller
    {
        function showError($id)
        {
            $errorMessage = "";
            
            switch($id)
            {
                case 1:
                    $errorMessage = "404 - Page not found";
                    break;
                case 2:
                    $errorMessage = "Username or password is not exists";
                    break;
                case 3:
                    $errorMessage = "User name is existed";
                    break;
                case 4:
                    $errorMessage = "Cannot create new account. Please, try again later!";
                    break;
                case 5:
                    $errorMessage = "Cannot create new Post. Please, try again later!";
                    break;
                case 6:
                    $errorMessage = "Cannot create new Comment. Please, try again later!";
                    break;
                case 7:
                    $errorMessage = "Permission deny";
                    break;
                default:
                    $errorMessage = "404 - Page not found";
            }

            $d["errorMessage"] = $errorMessage;
            $this->set($d);
            $this->render("showError");
        }
    }
?>