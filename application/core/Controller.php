<?php

namespace application\core;

abstract class Controller{

    public $route;
    public $view;
    public $acl;

    public function __construct($route){
//        $_SESSION['admin'] = 1;
        $this->route = $route;
        if(!$this->checkAcl()){
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name){
        $path = 'application\models\\'.ucfirst($name);
        if(class_exists($path)){
            return new $path;
        }
    }

    public function checkAcl(){
        $this->acl = require ROOT.'/acl/'.$this->route['controller'].'.php';
        if(!isset($_SESSION['account']['id'])and $this->isAcl('guest')){
            return true;
        }elseif(isset($_SESSION['account']['id']) and $this->isAcl('authorize')) {
            return true;
//        }elseif(!isset($_SESSION['account']['id']) and $this->isAcl('quest')) {
//            return true;
        }elseif(isset($_SESSION['admin']) and $this->isAcl('admin')) {
            return true;
        }
        return false;
    }

    public function isAcl($key){
        return in_array($this->route['action'], $this->acl[$key]);
    }
}