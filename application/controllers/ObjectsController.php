<?php

namespace application\controllers;

use application\core\Controller;

class ObjectsController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }

    // Вывод списка объектов
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get($_SESSION['account']['id']),
            'count' => $this->model->getCount($_SESSION['account']['id']),
        ];
        $this->view->render('Список объектов', $vars);
    }

    // TODO сделать валидацию данных для всех форм

    // Добавление объектов
    public function addAction()
    {
        if(!empty($_POST)){
            if(!$this->model->objectValidate($_POST)){
                $this->view->message('error', $this->model->error);
            }elseif(!$this->model->checkObjectExists($_POST['name'])){
                $this->view->message('error', $this->model->error);
            }
            $this->model->add($_POST);
            $this->view->location( 'objects', 'success', 'Объект успешно добавлен!');
        }
        $this->view->render('Добавить объект');
    }

    // Удаление объектов
    public function deleteAction(){
        if (!$this->model->isObjectExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->objectDelete($this->route['id']);
        $this->view->location('objects', 'success', 'Объект успешно удалён из базы данных!');
    }

    // Редактирование объектов
    public function editAction()
    {
        if (!$this->model->isObjectExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            if (!$this->model->objectValidate($_POST, 'edit')) {
                $this->view->message('error', $this->model->error);
            }
            $this->model->objectEdit($_POST, $this->route['id']);
            $this->view->location('objects','success', 'Объект успешно изменён!');
        }
        $vars = [
            'data' => $this->model->objectData($this->route['id'])[0],
        ];

        $this->view->render('Редактировать объект', $vars);
    }

    public function settingsAction()
    {
        $this->view->render('Настройки');
    }

    public function addworktypeAction()
    {
        $this->view->render('Добавить вид работ');
    }
}