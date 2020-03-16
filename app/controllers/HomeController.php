<?php

namespace app\controllers;

use app\components\Controller;
use app\components\View;
use app\libs\Pagination;

class HomeController extends Controller
{

  public function indexAction()
  {

    $params = [];

    $this->view->render('Главная', $params);
  }


  public function registerAction()
  {
    if (!empty($_POST)) {
      
    }
    $params = [];

    $this->view->render('Главная', $params);
  }
}
