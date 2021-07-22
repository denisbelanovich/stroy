<?php

namespace application\controllers;

use application\core\Controller;

class WorksController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }

    // Вывод списка работ
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get(),
            'count' =>$this->model->getCount(),
            'object' =>$this->model->getObject(),
        ];
        $this->view->render('Список работ', $vars);
    }

    // Добавление работы TODO сделать проверку на повторное добавление во всех контроллерах
    public function addAction()
    {
        if(!empty($_POST)){
            $this->model->add($_POST);
            $this->view->location( 'works/'.$this->route['id'], 'success', 'Работа успешно добавлена!');
        }
        $this->view->render('Добавить работу');
    }

    // Удаление работы
    public function deleteAction(){
        if (!$this->model->isWorkExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $this->model->workDelete($this->route['tag']);
        $this->view->location('works/'.$this->route['id'], 'success', 'Работа успешно удалена из базы данных!');
    }

    // Редактирование работы
    public function editAction()
    {
        if (!$this->model->isWorkExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->workEdit($_POST, $this->route['tag']);
            $this->view->location('works/'.$this->route['id'],'success', 'Работа успешно изменена!');
        }
        $vars = [
            'data' => $this->model->workData($this->route['tag'])[0],
        ];
        $this->view->render('Редактировать работы', $vars);
    }
}