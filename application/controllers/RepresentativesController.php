<?php

namespace application\controllers;

use application\core\Controller;

class RepresentativesController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }

    // Вывод списка представителей
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get(),
            'count' =>$this->model->getCount(),
            'object' =>$this->model->getObject(),
        ];
        $this->view->render('Список представителей', $vars);
    }

    // Добавление представителя TODO сделать проверку на повторное добавление во всех контроллерах
    public function addAction()
    {
        if(!empty($_POST)){
            $this->model->add($_POST);
            $this->view->location( 'representatives/'.$this->route['id'], 'Готово!', 'Представитель успешно добавлен!');
        }
        $this->view->render('Добавить представителя');
    }

    // Удаление представителя
    public function deleteAction(){
        if (!$this->model->isRepresentativesExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $this->model->representativesDelete($this->route['tag']);
        $this->view->location('representatives/'.$this->route['id'], 'success', 'Представитель успешно удалён из базы данных!');
    }

    // Редактирование представителя
    public function editAction()
    {
        if (!$this->model->isRepresentativesExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            if (!$this->model->representativesValidate($_POST, 'edit')) {
                $this->view->message('Ошибка!', $this->model->error);
            }
            $this->model->representativesEdit($_POST, $this->route['tag']);
            $this->view->location('representatives/'.$this->route['id'], 'Готово!', 'Представитель успешно изменён!');
        }
        $vars = [
            'data' => $this->model->representativesData($this->route['tag'])[0],
        ];
        $this->view->render('Редактировать представителя', $vars);
    }
}