<?php

namespace application\models;

use application\core\Model;

class Drawings extends Model
{

    public function get()
    {
        return $this->db->row('SELECT * FROM drawings');
    }

    public function getCount()
    {
        return $this->db->row('SELECT objects_id, COUNT(*) as count FROM drawings GROUP BY objects_id');
    }

    public function getObject()
    {
        return $this->db->row('SELECT id, name FROM objects');
    }

    public function add($post){
        $params = [
            'objects_id' => $post['objects_id'],
            'name_drawing' => $post['name_drawing'],
            'number_drawing' => $post['number_drawing'],
            'date' => $post['date'],
        ];
        $this->db->query('INSERT INTO drawings (objects_id, name_drawing, number_drawing, date) VALUES (:objects_id, :name_drawing, :number_drawing, :date)', $params);
        return $this->db->lastInsertId();
    }

    public function isDrawingExists($tag) {
        $params = [
            'tag' => $tag,
        ];
        return $this->db->column('SELECT tag FROM drawings WHERE tag = :tag', $params);
    }

    public function drawingDelete($tag) {
        $params = [
            'tag' => $tag,
        ];
        $this->db->query('DELETE FROM drawings WHERE tag = :tag', $params);
    }

    public function drawingEdit($post, $tag){
        $params = [
            'tag' => $tag,
            'name_drawing' => $post['name_drawing'],
            'number_drawing' => $post['number_drawing'],
            'date' => $post['date'],
        ];
        $this->db->query('UPDATE drawings SET name_drawing = :name_drawing, number_drawing = :number_drawing, date = :date WHERE tag = :tag', $params);
    }

    public function drawingData($tag){
        $params =[
            'tag' => $tag,
        ];
        return $this->db->row('SELECT * FROM drawings WHERE tag = :tag', $params);
    }
}