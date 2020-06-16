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

        function exSignUp()
        {
            if(isset($_POST['us']) && isset($_POST['pw']) && isset($_POST['dn']) && isset($_POST['email']))
            {
                $us = $_POST['us'];
                $pw = $_POST['pw'];
                $dn = $_POST['dn'];
                $email = $_POST['email'];

                $account = new Account();
                $account->username = $us; 
                $account->password = $pw;
                $account->display_name = $dn; 
                $account->email = $email;

                $accountBUS = new AccountBUS();
                
                $acc = $accountBUS->register($account);

                if($acc == false)
                    $this->redirectToErrorAction("3");
                else if ($acc == null)
                    $this->redirectToErrorAction("4");
                else
                {
                    $_SESSION["account"] = serialize($acc);
                    $this->redirectToAction("home");
                }
            }
            else
            {
                $this->redirectToErrorAction("4");
            }
        }

        function signOut()
        {
            session_destroy();
            $this->redirectToAction("home");
        }
    }
?>