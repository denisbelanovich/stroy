<?php

namespace application\models;

use application\core\Model;

class Materials extends Model
{
    public function get()
    {
        return $this->db->row('SELECT * FROM materials');
    }

    public function getCount()
    {
        return $this->db->row('SELECT objects_id, COUNT(*) as count FROM materials GROUP BY objects_id');
    }

    public function getObject()
    {
        return $this->db->row('SELECT id, name FROM objects');
    }

    public function add($post){
        $params = [
            'objects_id' => $post['objects_id'],
            'name_material' => $post['name_material'],
            'name_document' => $post['name_document'],
            'number' => '№ '.$post['number'],
            'date' => $post['date'],
        ];
        $this->db->query('INSERT INTO materials (objects_id, name_material, name_document, number, date) VALUES (:objects_id, :name_material, :name_document, :number, :date)', $params);
        return $this->db->lastInsertId();
    }

    public function isMaterialExists($tag) {
        $params = [
            'tag' => $tag,
        ];
        return $this->db->column('SELECT tag FROM materials WHERE tag = :tag', $params);
    }

    public function materialDelete($tag) {
        $params = [
            'tag' => $tag,
        ];
        $this->db->query('DELETE FROM materials WHERE tag = :tag', $params);
    }

    public function materialEdit($post, $tag){
        $params = [
            'tag' => $tag,
            'name_material' => $post['name_material'],
            'name_document' => $post['name_document'],
            'number' => $post['number'],
            'date' => $post['date'],
        ];
        $this->db->query('UPDATE materials SET name_material = :name_material, name_document = :name_document, number = :number, date = :date WHERE tag = :tag', $params);
    }

    public function materialData($tag){
        $params =[
            'tag' => $tag,
        ];
        return $this->db->row('SELECT * FROM materials WHERE tag = :tag', $params);
    }
}