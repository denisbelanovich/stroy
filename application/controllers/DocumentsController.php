<?php


namespace application\controllers;
use application\core\Controller;
use application\core\Word;
class DocumentsController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        $this->view->layout = 'default';
    }

    // Вывод списка документов
    public function showAction()
    {
        $vars = [
            'list' => $this->model->get(),
            'count' =>$this->model->getCount(),
            'object' =>$this->model->getObject(),
        ];
        $this->view->render('Список документов', $vars);
    }

    // Добавление документа
    public function addAction()
    {
        if(!empty($_POST) && isset($_POST['f0'])) {
            $_POST['f11'] = date('d-m-Y', strtotime($_POST['f11']));
            $_POST['f12'] = date('d-m-Y', strtotime($_POST['f12']));
            $_POST['f13'] = date('d-m-Y', strtotime($_POST['f13']));
            $_POST['f8'] = is_array($_POST['f8']) ? implode(', ', $_POST['f8']) : $_POST['f8'];
            if(isset($_POST['f9'])){
                $_POST['f9'] = is_array($_POST['f9']) ? implode(', ', $_POST['f9']) : $_POST['f9'];
            }
            if(!isset($_POST['f15'])){
                $_POST['f15'] = "";
            }
            switch ($_POST['f0']) {
                case 'aosr':
                    $word = new Word(1);
                    $_POST['f0'] = 'АОСР';
                    $word->generate('aosr', $_POST);
                    $filename = $_POST['f0'].'_№'.$_POST['f6'].'_'.preg_replace('/\\\|\\/|\\\:|\*|\?|\\\<|\\\>|\\\”|\|/ui', '-', str_replace(" ","_",$_POST['f7'])).'_'.strtotime("now");
                    $word->transferDocument($filename);
                    $_POST['filename'] = $filename;
                    break;
                case 'appok':
                    $word = new Word(2);
                    $_POST['f0'] = 'АППОК';
                    $word->generate('appok', $_POST);
                    $filename = $_POST['f0'].'_№'.$_POST['f6'].'_'.preg_replace('/\\\|\\/|\\\:|\*|\?|\\\<|\\\>|\\\”|\|/ui', '-', str_replace(" ","_",$_POST['f7'])).'_'.strtotime("now");
                    $word->transferDocument($filename);
                    $_POST['filename'] = $filename;
                    break;
                case 'r':
                    $word = new Word(3);
                    $_POST['f0'] = 'РЕЕСТР';
                    break;
                default:
                    exit('Попытка создать неизвестный тип шаблона');
            }
            $this->model->add($_POST);
            $this->view->location( 'documents/'.$this->route['id'],'success', 'Документ успешно добавлен!');
        }

        $vars = [
            'representative' => $this->model->representativeData($this->route['id']),
            'work' => $this->model->workData($this->route['id']),
            'object' => $this->model->objData($this->route['id'])[0],
            'project' => $this->model->projectData($this->route['id']),
            'material' => $this->model->materialData($this->route['id']),
        ];
        $this->view->render('Добавить документ', $vars);
    }

    // Удаление документа
    public function deleteAction(){
        if (!$this->model->isDocumentExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $filename = $this->model->getFilename($this->route['tag']);
        $doctype = $this->model->getForm( $this->route['tag']);
        switch ($doctype){
            case 'АОСР':
                $word = new Word(1);
                $word->deleteDocument($filename);
                break;
            case 'АППОК':
                $word = new Word(2);
                $word->deleteDocument($filename);
                break;
            case 'РЕЕСТР':
                $word = new Word(3);
                $word->deleteDocument($filename);
                break;
            default:
                exit('Попытка скачать неизвестный тип шаблона');
        }
        $this->model->documentDelete($this->route['tag']);
        $this->view->location('documents/'.$this->route['id'], 'success', 'Документ успешно удален из базы данных!');
    }

    // Скачивание документа
    public function downloadAction(){
        if (!$this->model->isDocumentExists($this->route['tag'])) {
            $this->view->errorCode(404);
        }
        $filename = $this->model->getFilename($this->route['tag']);
        $doctype = $this->model->getForm( $this->route['tag']);
            switch ($doctype){
                case 'АОСР':
                    $word = new Word(1);
                    $word->downloadDocument($filename);
                    break;
                case 'АППОК':
                    $word = new Word(2);
                    $word->downloadDocument($filename);
                    break;
                case 'РЕЕСТР':
                    $word = new Word(3);
                    $word->downloadDocument($filename);
                    break;
                default:
                    exit('Попытка скачать неизвестный тип шаблона');
            }
    }
}