<?php 
    class Helpers {
        public static function requireToVar($file){
            ob_start();
            require($file);
            return ob_get_clean();
        }

        public static function redirect($url)
        {
            return WEBROOT.$url;
        }
    }