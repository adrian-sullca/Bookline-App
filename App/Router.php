<?php

namespace App;

class Router
{
    private $controller;
    private $method;
    private $values = [];

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {

        $url_without_query = strtok($_SERVER['REQUEST_URI'], '?');

        $url_array = explode('/', trim($url_without_query, '/')); 

        $this->controller = !empty($url_array[0]) ? $url_array[0] : 'user';

        $this->controller = ucfirst(strtolower($this->controller));
        $controllerClass = "App\\Controllers\\" . $this->controller . "Controller";

        $controllerPath = __DIR__ . "/controllers/" . $this->controller . "Controller.php";

        if (!file_exists($controllerPath)) {
            $this->controller = "ErrorController"; 
            $controllerClass = "App\\Controllers\\ErrorController"; 
            $controllerPath = __DIR__ . "/controllers/ErrorController.php";
        }

        require_once($controllerPath);

        $this->method = isset($url_array[1]) ? $url_array[1] : 'index';

        $items = count($url_array);
        if ($items > 2) {
            for ($i = 2; $i < $items; $i++) {
                $this->values[$i - 2] = $url_array[$i];
            }
        }
    }

    public function run()
    {
        $controllerClass = "App\\Controllers\\" . $this->controller . "Controller";
        $c = new $controllerClass();

        if (!method_exists($c, $this->method)) {
            echo "Método no encontrado, usando index";
            $this->method = 'index';
        }

        $method = $this->method;
        error_log("Ejecutando método: " . $method);

        if (count($this->values) > 0) {
            call_user_func_array([$c, $method], $this->values);
        } else {
            $c->$method();
        }
    }
}
