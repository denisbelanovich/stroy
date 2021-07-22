<?php
namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }

    public function indexAction(){
        $this->view->layout = 'main';
        $this->view->render('StroyDoc - Главная страница');
    }
}