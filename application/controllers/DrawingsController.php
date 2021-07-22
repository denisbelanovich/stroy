<?php


namespace application\controllers;

use application\core\Controller;

class DrawingsController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }
    // Вывод списка исполнительных схем
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get(),
            'count' =>$this->model->getCount(),
            'object' =>$this->model->getObject(),
        ];
        $this->view->render('Список исполнительных схем', $vars);
    }

    // Добавление схемы
    public function addAction()
    {
        if(!empty($_POST)){
            $this->model->add($_POST);
            $this->view->location( 'drawings/'.$this->route['id'],'success', 'Схема успешно добавлена!');
        }
        $this->view->render('Добавить исполнительную схему');
    }

    // Удаление схемы
    public function deleteAction(){
        if (!$this->model->isDrawingExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $this->model->drawingDelete($this->route['tag']);
        $this->view->location('drawings/'.$this->route['id'], 'success', 'Схема успешно удалена из базы данных!');
    }

    // Редактирование схемы
    public function editAction()
    {
        if (!$this->model->isDrawingExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->drawingEdit($_POST, $this->route['tag']);
            $this->view->location('drawings/'.$this->route['id'],'success', 'Схема успешно изменена!');
        }
        $vars = [
            'data' => $this->model->drawingData($this->route['tag'])[0],
        ];
        $this->view->render('Редактировать исполнительную схему', $vars);
    }
}