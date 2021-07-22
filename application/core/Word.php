<?php


namespace application\core;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
class Word extends PhpWord
{
    private $pathTemplate;
    private $pathGenerate;
    private $pathCurrent;
    private $oDocument = null;

    const basePatch = 'application/tmp';
    const aosr = 1;
    const appok = 2;
    const r = 3;

    public function __construct($doctype) {
        \PhpOffice\PhpWord\Settings::setTempDir('application/tmp');
        $this->pathTemplate = self::basePatch.'/template/';
        $this->pathGenerate = self::basePatch.'/generate/';

        switch ($doctype){
            case self::aosr:
                $this->pathCurrent = $this->pathTemplate.'aosr/';
                break;
            case self::appok:
                $this->pathCurrent = $this->pathTemplate.'appok/';
                break;
            case self::r:
                $this->pathCurrent = $this->pathTemplate.'r/';
                break;
            default:
                exit('Попытка создать неизвестный тип шаблона');
        }
        parent::__construct();
    }

    public function generate($templateName, array $aValue) {
        $templateName.= '.docx';
        $document = new TemplateProcessor($this->pathCurrent . $templateName);

        foreach ($aValue as $key => $value)
            $document->setValue($key, $value);

        $this->oDocument = $document;
    }

    public function transferDocument($fileName) {
        if (!is_null($this->oDocument)) {
            $fileName .= '.docx';
            $this->oDocument->saveAs($this->pathGenerate . $fileName);
        }
    }

    public function downloadDocument($filename){
        $file = $this->pathGenerate.$filename.'.docx';
        if(file_exists($file)){
            header('Content-Description: File Transfer');
            // MIME type
            header('Content-Type: application/octet-stream');
            // Предлагаем сохранить
            header('Content-Disposition: attachment; filename='.basename($file));
            // Не кэшировать данные
            header("Expires: 0");// дата в прошлом
            header("Pragma: no-cache");// HTTP/1.0
            header("Cache-Control: no-store, no-cache, must-revalidate");// HTTP/1.1
            header("Cache-Control: post-check=0, pre-check=0", false);
            // Длина (размер) содержимого
            header('Content-Length: '.filesize($file));
            // Размер в байтах
            header("Accept-Ranges: bytes");
            // Время выполнения скрипта (0 = неограниченно)
            set_time_limit(120);
            // Читаем файл и пишем его в буфер вывода
            readfile($file);
            exit;
        }else{
            die('Файла не существует');
        }
    }

    public function deleteDocument($filename){
        $file = $this->pathGenerate.$filename.'.docx';
        if(file_exists($file)){
            unlink($file);
        }else{
            die('Файла не существует');
        }
    }

}
