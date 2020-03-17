<?php

namespace app\controllers;

use app\components\Controller;
use app\libs\Weather;


class HomeController extends Controller
{

  public function indexAction()
  {
    $this->view->render('Главная', []);
  }

  public function registerAction()
  {
    if (!empty($_POST)) {
      if (!$this->model->validation(['firstName', 'lastName', 'email'], $_POST)) {
        $this->view->validationMessage(['firstName', 'lastName', 'email'], $this->model->rules);
      }
      if (!$this->model->checkEmail($_POST)) {
        $this->view->validationMessage(['firstName', 'lastName', 'email', 'account'], $this->model->rules);
      }
      $this->model->createNewUser($_POST);
      $this->view->message('Register Success', 'Регистрация прошла успешно!', '/home/index');
    }
    $this->view->render('Главная', ['rules' => $this->model->rules]);
  }

  public function weatherAction()
  {
    $weather = new Weather();
    $this->view->render('Главная', ['weather' => $weather->getWeather()]);
  }
}
