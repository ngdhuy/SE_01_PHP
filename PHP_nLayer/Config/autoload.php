<?php 
    function autoloader($class) {
        $root = './';
        $prefix = '.\\';

        $classWithoutPrefix = preg_replace('/^'.preg_quote($prefix).'/', '', $class);
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $classWithoutPrefix).'.php';

        $path = $root.$file;
        if(file_exists($path)) {
            require_once $path;
        }
    }

    spl_autoload_register('autoloader');
?>