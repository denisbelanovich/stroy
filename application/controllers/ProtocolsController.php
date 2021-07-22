<?php

namespace application\controllers;

use application\core\Controller;

class ProtocolsController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }

    // Вывод списка протоколов
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get(),
            'count' =>$this->model->getCount(),
            'object' =>$this->model->getObject(),
        ];
        $this->view->render('Список протоколов', $vars);
    }

    // Добавление протокола
    public function addAction()
    {
        if(!empty($_POST)){
            $this->model->add($_POST);
            $this->view->location( 'protocols/'.$this->route['id'],'success', 'Протокол успешно добавлен!');
        }
        $this->view->render('Добавить протокол');
    }

    // Удаление протокола
    public function deleteAction(){
        if (!$this->model->isProtocolExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $this->model->protocolDelete($this->route['tag']);
        $this->view->location('protocols/'.$this->route['id'], 'success', 'Протокол успешно удалён из базы данных!');
    }

    // Редактирование протокола
    public function editAction()
    {
        if (!$this->model->isProtocolExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            $this->model->protocolEdit($_POST, $this->route['tag']);
            $this->view->location('protocols/'.$this->route['id'],'success', 'Протокол успешно изменён!');
        }
        $vars = [
            'data' => $this->model->protocolData($this->route['tag'])[0],
        ];
        $this->view->render('Редактировать прокотол', $vars);
    }
}