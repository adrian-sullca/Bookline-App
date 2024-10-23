<?php

namespace App\Core;

class Controller
{
    protected function render($path, $params = [], $layout = "")
    {
        ob_start();
        require_once(__DIR__ . "/../views/" . $path . ".view.php");
        $params['content'] = ob_get_clean();
        require_once(__DIR__ . "/../views/layouts/" . $layout . ".layout.php");
    }
}