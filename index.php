<?php

use app\components\Router;

function debug($item)
{
  echo "<pre>";
  var_dump($item);
  echo "</pre>";
  exit();
}


spl_autoload_register(function ($class) {
  $path = str_replace('\\', '/', $class . ".php");
  if (file_exists($path)) {
    require $path;
  }
});
session_start();
// $_SESSION['authorized']['account_name'] = 'z';
// $_SESSION['admin'] = 'z';
// unset($_SESSION['card']);
// unset($_SESSION['card-count']);
// unset($_SESSION['card-fullPrice']);
//debug($_SESSION);
// unset($_SESSION['admin']);
// unset($_SESSION['authorized']);
$router = new Router;
$router->run();
