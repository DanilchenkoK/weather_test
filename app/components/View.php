<?php

namespace app\components;

class View
{
    public $path;
    public $route;
    public $layout = 'default';
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . "/" . $route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $fullpath = 'app/views/' . $this->path . '.php';
        if (file_exists($fullpath)) {
            ob_start();
            include_once 'app/views/' . $this->path . '.php';
            $content = ob_get_clean();
            include_once 'app/views/layouts/' . $this->layout . '.php';
        }
    }
    public function redirect($url)
    {
        header('location: /' . $url);
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $fullpath = 'app/views/errors/' . $code . '.php';
        if (file_exists($fullpath)) {
            include $fullpath;
            exit;
        }
    }

    public function message($status, $message, $urlocation = null)
    {
        exit(json_encode(['status' => $status, 'message' => $message, 'urlocation' => $urlocation]));
    }
    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }
    public function validationMessage($inputs, $errors)
    {
        exit(json_encode(['inputs' => $inputs, 'validation' => $errors]));
    }
}
