<?php 
    namespace Helpers;
    class Helpers {
        public static function requireToVar($file){
            ob_start();
            require($file);
            return ob_get_clean();
        }
    }