<?php 
    namespace Helpers;

    class authentication
    {
        public static function isSignIn()
        {
            return isset($_SESSION['account']);
        }

        public static function isAdminRole()
        {
            if(authentication::isSignIn())
            {
                $account = unserialize($_SESSION['account']);
                if ($account->role == "admin")
                    return true;
                else
                    return false;
            } 
            else 
            {
                return false;
            }
        }
    }
?>