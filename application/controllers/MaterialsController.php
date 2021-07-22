<?php

namespace application\controllers;

use application\core\Controller;

class MaterialsController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }

    // Вывод списка материалов
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get(),
            'count' =>$this->model->getCount(),
            'object' =>$this->model->getObject(),
        ];
        $this->view->render('Список материалов', $vars);
    }

    // Добавление материала
    public function addAction()
    {
        if(!empty($_POST)){
            $this->model->add($_POST);
            $this->view->location( 'materials/'.$this->route['id'],'success', 'Материал успешно добавлен!');
        }
        $this->view->render('Добавить материал');
    }

    // Удаление материала
    public function deleteAction(){
        if (!$this->model->isMaterialExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $this->model->materialDelete($this->route['tag']);
        $this->view->location('materials/'.$this->route['id'], 'success', 'Материал успешно удалён из базы данных!');
    }

    // Редактирование материала
    public function editAction()
    {
        if (!$this->model->isMaterialExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->materialEdit($_POST, $this->route['tag']);
            $this->view->location('materials/'.$this->route['id'],'success', 'Материал успешно изменён!');
        }
        $vars = [
            'data' => $this->model->materialData($this->route['tag'])[0],
        ];
        $this->view->render('Редактировать материал', $vars);
    }
}