<?php 
    class Database
    {
        private static $bdd = null;

        private function __construct()
        {

        }

        public static function getBDD()
        {
            if(is_null(self::$bdd)) 
            {
                self::$bdd = new PDO("mysql:host=localhost;dbname=todo_php", 'root', 'root');
            }

            return self::$bdd;
        }
    }
?>