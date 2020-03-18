<?php

namespace app\controllers;

use app\components\Controller;
use app\libs\Weather;


class HomeController extends Controller
{

  public function indexAction()
  {
    $this->view->render('Главная');
  }

  public function contactAction()
  {
    $this->view->render('Обратная связь');
  }
  public function loginAction()
  {
    isset($_SESSION['authorized']) ? $this->view->redirect('index') : null;
    if (!empty($_POST)) {
      if (!$this->model->validation(['email', 'password'], $_POST)) {
        $this->view->validationMessage(['email', 'password'], $this->model->rules);
      }
      if (!$this->model->checkEmailAndPassword($_POST)) {
        $this->view->validationMessage(['email', 'password', 'account'], $this->model->rules);
      }
      $this->view->message('Status OK', 'Вход выполнен успешно!', '/' . $_POST['rUrl']);
    }
    $this->view->render('Вход', [
      'rules' => $this->model->rules,
      'rUrl' => $this->route['url']
    ]);
  }
  public function registerAction()
  {
    isset($_SESSION['authorized']) ? $this->view->redirect('index') : null;
    if (!empty($_POST)) {
      if (!$this->model->validation(['firstName', 'lastName', 'email', 'password'], $_POST)) {
        $this->view->validationMessage(['firstName', 'lastName', 'password', 'email'], $this->model->rules);
      }
      if (!$this->model->checkEmail($_POST)) {
        $this->view->validationMessage(['firstName', 'lastName', 'email', 'password', 'account'], $this->model->rules);
      }
      $this->model->createNewUser($_POST);
      $this->view->message('Register Success', 'Регистрация прошла успешно!', '/index');
    }

    $this->view->render('Регистрация', ['rules' => $this->model->rules]);
  }

  public function logoutAction()
  {
    $this->model->logoutAccount();
    $this->view->redirect($this->route['url']);
  }

  public function weatherAction()
  {
    $weather = new Weather();
    $this->view->render('Погода в Запорожье', [
      'weather' => $weather->getWeather()
    ]);
  }
}
