<?php
namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class AdminController extends Controller {

    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction(){
        if(isset($_SESSION['admin'])){
            $this->view->redirect('admin/users');
        }
        if(!empty($_POST)){
            if(!$this->model->loginValidate($_POST)){
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('admin/users', 'success', "Авторизация прошла успешно!");
        }
        $this->view->render('Страница входа');
    }

    public function logoutAction(){
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }

    public function usersAction(){
        $pagination = new Pagination($this->route, $this->model->userCount());
        $vars = [
            'pagination' => $pagination->get(),
            'list' => $this->model->userList($this->route),
        ];
        $this->view->render('Список пользователей', $vars);
    }

    public function deleteAction(){
        if (!$this->model->isUserExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->userDelete($this->route['id']);
        $this->view->location('admin/users', 'success', 'Пользователь успешно удалён из базы данных!');
    }
}