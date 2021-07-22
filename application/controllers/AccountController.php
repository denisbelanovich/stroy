<?php
namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'main';
    }

    // Регистрация аккаунта
    public function registerAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['login', 'password', 'password_confirm', 'email', 'lastname', 'firstname'], $_POST)){
                $this->view->message('error', $this->model->error);
            }
            elseif(!$this->model->checkLoginExists($_POST['login'])){
                $this->view->message('error', $this->model->error);
            }
            elseif(!$this->model->checkEmailExists($_POST['email'])){
                $this->view->message('error', $this->model->error);
            }
            $this->model->register($_POST);
            $this->view->message('success', "Регистрация прошла успешно, подтвердите свой E-mail");
        }
        $this->view->render('Регистрация');
    }
    // Подтверждение регистрации
    public function confirmAction(){
        if(!$this->model->checkTokenExists($this->route['token'])){
            $this->view->redirect('account/login');
        }
        $this->model->activate($this->route['token']);
        $this->view->render('Регистрация завершена');
    }

    // Вход
    public function loginAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['login', 'password'], $_POST)){
                $this->view->message('error', $this->model->error);
            }
            elseif(!$this->model->checkData($_POST['login'], $_POST['password'])){
                $this->view->message('error', 'Логин или пароль указан неверно');
            }
            elseif(!$this->model->checkStatus('login', $_POST['login'])){
                $this->view->message('error', $this->model->error);
            }
            $this->model->login($_POST['login']);
            $this->view->location( 'objects', 'success', "Авторизация прошла успешно!");
        }
        $this->view->render('Вход');
    }

    //Выход
    public function logoutAction(){
        unset($_SESSION['account']);
        $this->view->redirect('account/login');
    }

    // Восстановление пароля
    public function recoveryAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['email'], $_POST)){
                $this->view->message('error', $this->model->error);
            }
            elseif($this->model->checkEmailExists($_POST['email'])){
                $this->view->message('error', 'E-mail не найден');
            }
            elseif(!$this->model->checkStatus('email', $_POST['email'])){
                $this->view->message('error', $this->model->error);
            }
            $this->model->recovery($_POST);
            $this->view->message('success', "Запрос на восстановление пароля отправлен на E-mail");
        }
        $this->view->render('Восстановление пароля');
    }

    // Сброс пароля
    public function resetAction(){
        if(!$this->model->checkTokenExists($this->route['token'])){
            $this->view->redirect('account/login');
        }
        $password = $this->model->reset($this->route['token']);
        $vars = [
            'password' => $password
        ];
        $this->view->render('Пароль сброшен', $vars);
    }

    // Настройки аккаунта
    public function settingsAction(){
        if(!empty($_POST)){
            if(!$this->model->validate(['login', 'password'], $_POST)){
                $this->view->message('error', $this->model->error);
            }
            if(!$this->model->checkData($_POST['login'], $_POST['password'])){
                $this->view->message('error', 'Логин или пароль указан неверно');
            }
            if($_POST['new_password'] != $_POST['confirm_new_password']){
                $this->view->message('error', 'Пароли не совпадают');
            }elseif ($_POST['password'] === $_POST['new_password']){
                $this->view->message('error', 'Текущий и новый пароль совпадают, измените новый пароль');
            }
            if(!$this->model->validate(['new_password'], $_POST)){
                $this->view->message('error', $this->model->error);
            }
            $this->model->changePassword($_POST);
            $this->view->location( 'objects', 'success', 'Пароль успешно изменён!');
        }
        $this->view->render('Настройки');
    }
}