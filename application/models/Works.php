<?php

namespace application\models;

use application\core\Model;

class Works extends Model
{
    public function get()
    {
        return $this->db->row('SELECT * FROM works');
    }

    public function getCount()
    {
        return $this->db->row('SELECT objects_id, COUNT(*) as count FROM works GROUP BY objects_id');
    }

    public function getObject()
    {
        return $this->db->row('SELECT id, name FROM objects');
    }

    public function add($post){
        $params = [
            'objects_id' => $post['objects_id'],
            'date_start' => $post['date_start'],
            'date_end' => $post['date_end'],
            'name_work' => $post['name_work'],
        ];
        $this->db->query('INSERT INTO works (objects_id, date_start, date_end, name_work) VALUES (:objects_id, :date_start, :date_end, :name_work)', $params);
        return $this->db->lastInsertId();
    }

    public function isWorkExists($tag) {
        $params = [
            'tag' => $tag,
        ];
        return $this->db->column('SELECT tag FROM works WHERE tag = :tag', $params);
    }

    public function workDelete($tag) {
        $params = [
            'tag' => $tag,
        ];
        $this->db->query('DELETE FROM works WHERE tag = :tag', $params);
    }

    public function workEdit($post, $tag){
        $params = [
            'tag' => $tag,
            'date_start' => $post['date_start'],
            'date_end' => $post['date_end'],
            'name_work' => $post['name_work'],
        ];
        $this->db->query('UPDATE works SET date_start = :date_start, date_end = :date_end, name_work = :name_work WHERE tag = :tag', $params);
    }

    public function workData($tag){
        $params =[
            'tag' => $tag,
        ];
        return $this->db->row('SELECT * FROM works WHERE tag = :tag', $params);
    }
}