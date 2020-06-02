<?php
    use Models\Account;
    use BUS\AccountBUS;

    class accountController extends Controller
    {
        function signIn()
        {
            $this->render("signIn");
        }

        function exSignIn()
        {
            if(isset($_POST['us']) && isset($_POST['pw'])){
                $us = $_POST['us'];
                $pw = $_POST['pw'];

                $accountBUS = new AccountBUS();
                $account = $accountBUS->login($us, $pw);
                
                if($account == null)
                    $this->redirectToErrorAction("2");
                else {
                    $_SESSION["account"] = serialize($account);
                    $this->redirectToAction("home");
                }
                    
            } else {
                $this->redirectToAction("home");
            }
        }

        function signOut()
        {
            session_destroy();
            $this->redirectToAction("home");
        }
    }
?>