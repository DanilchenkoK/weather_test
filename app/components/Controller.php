<?php
namespace app\components;
use app\components\View;
abstract class Controller{
    public $route;
    public $view;
    public $model;
    private $acl;
    public function __construct($route){
        
        $this->route = $route;  
        if(!$this->checkAcl()){
           View::errorCode(403);
        }      
        $this->view = new View($route);  
        $this->model =  $this->loadModel($route['controller']);
           
    }
    private function loadModel($name){
        $path='app\\models\\'.ucfirst($name);
                if(class_exists($path)){
            return new $path;
        }
    }

    private function checkAcl(){
        $acl =  'app/aci/'.$this->route['controller'].'.php';
        if(file_exists($acl)){
           $this->acl  = include_once $acl;
           if($this->isAcl('all')){
               return true;
           }else if(isset($_SESSION['authorized']['id']) and $this->isAcl('authorized')){
               return true;
           }else if(!isset($_SESSION['authorized']['id']) and $this->isAcl('guest')){
               return true;
           }else if(isset($_SESSION['admin']) and $this->isAcl('admin')){
               return true;
           } 
        }
        return false;
    }

    private function isAcl($key){
        return in_array($this->route['action'],$this->acl[$key]);
    }
}