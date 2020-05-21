<?php
    // http://localhost/PHP_MVC/home/getProductByID/123
    // => controller   : home => homeController
    // => action       : getProductByID
    // => parameter    : id = 123

    class Router
    {
        static public function parse($url, $request)
        {
            $url = trim($url);
            
            if($url == "/PHP_MVC/")
            {
                $request->controller = "home";
                $request->action = "index";
                $request->params = [];
            }
            else
            {
                $explode_url = explode('/', $url);
                $explode_url = array_slice($explode_url, 2);

                $request->controller = $explode_url[0];
                if(count($explode_url) == 1)
                {
                    $request->action = "index";
                    $request->params = [];
                }
                else
                {
                    $request->action = $explode_url[1];
                    $request->params = array_slice($explode_url, 2);
                }
            }
        }
    }
?>

