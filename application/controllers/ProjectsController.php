<?php

namespace application\controllers;

use application\core\Controller;

class ProjectsController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }
    // Вывод проектов
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get(),
            'count' =>$this->model->getCount(),
            'object' =>$this->model->getObject(),
        ];
        $this->view->render('Список проектов', $vars);
    }

    //    TODO добавить проверку на добавление одинакового проекта

    // Добавление проекта
    public function addAction()
    {
        if(!empty($_POST)){
            $this->model->add($_POST);
            $this->view->location( 'projects/'.$this->route['id'],'success', 'Проект успешно добавлен!');
        }
        $this->view->render('Добавить проект');
    }

    // Удаление проекта
    public function deleteAction(){
        if (!$this->model->isProjectExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $this->model->projectDelete($this->route['tag']);
        $this->view->location('projects/'.$this->route['id'], 'success', 'Проект успешно удалён из базы данных!');
    }

    // Редактирование проекта
    public function editAction()
    {
        if (!$this->model->isProjectExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->projectEdit($_POST, $this->route['tag']);
            $this->view->location('projects/'.$this->route['id'], 'success', 'Проект успешно изменён!');
        }
        $vars = [
            'data' => $this->model->projectData($this->route['tag'])[0],
        ];
        $this->view->render('Редактировать объект', $vars);
    }
}

