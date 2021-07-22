<?php

namespace application\models;

use application\core\Model;

class Documents extends Model
{

    public function get()
    {
        return $this->db->row('SELECT * FROM documents');
    }

    public function getCount()
    {
        return $this->db->row('SELECT objects_id, COUNT(*) as count FROM documents GROUP BY objects_id');
    }

    public function getObject()
    {
        return $this->db->row('SELECT id, name FROM objects');
    }

    public function getForm($tag)
    {
        $params =[
            'tag' => $tag,
        ];
        return $this->db->column('SELECT akt_form FROM documents WHERE tag = :tag', $params);
    }

    public function getFilename($tag)
    {
        $params =[
            'tag' => $tag,
        ];
        return $this->db->column('SELECT filename FROM documents WHERE tag = :tag', $params);
    }

    public function add($post){
        $params = [
            'objects_id' => $post['objects_id'],
            'akt_form' => $post['f0'],
            'filename' => $post['filename'],
            'number_doc' => $post['f6'],
            'work_doc' => $post['f7'],
            'representative_doc' => $post['f16'],
        ];
        $this->db->query('INSERT INTO documents (objects_id, akt_form, filename, number_doc, work_doc, representative_doc) VALUES (:objects_id, :akt_form, :filename, :number_doc, :work_doc, :representative_doc)', $params);
        return $this->db->lastInsertId();
    }

    public function isDocumentExists($tag) {
        $params = [
            'tag' => $tag,
        ];
        return $this->db->column('SELECT date FROM documents WHERE tag = :tag', $params);
    }

    public function documentDelete($tag) {
        $params = [
            'tag' => $tag,
        ];
        $this->db->query('DELETE FROM documents WHERE tag = :tag', $params);
    }

    public function documentEdit($post, $tag){
        $params = [
            'tag' => $tag,
            'number_doc' => $post['number_doc'],
            'work_doc' => $post['work_doc'],
            'representative_doc' => $post['representative_doc'],
        ];
        $this->db->query('UPDATE drawings SET number_doc = :number_doc, work_doc = :work_doc, representative_doc = :representative_doc WHERE tag = :tag', $params);
    }

    public function objData($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->row('SELECT name FROM objects WHERE id = :id', $params);
    }

    public function projectData($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->row('SELECT name_porg, cypher, number_list, DATE_FORMAT(date, \'%d.%m.%Y\') as date FROM projects WHERE objects_id = :id', $params);
    }

    public function materialData($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->row('SELECT name_material, name_document, number, DATE_FORMAT(date, \'%d.%m.%Y\') as date FROM materials WHERE objects_id = :id', $params);
    }

    public function representativeData($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->row('SELECT name_orgs, position, fio FROM representatives WHERE objects_id = :id', $params);
    }

    public function workData($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->row('SELECT date_start, date_end, name_work FROM works WHERE objects_id = :id', $params);
    }

}