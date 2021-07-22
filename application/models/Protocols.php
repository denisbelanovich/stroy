<?php

namespace application\models;

use application\core\Model;

class Protocols extends Model
{
    public function get()
    {
        return $this->db->row('SELECT * FROM protocols');
    }

    public function getCount()
    {
        return $this->db->row('SELECT objects_id, COUNT(*) as count FROM protocols GROUP BY objects_id');
    }

    public function getObject()
    {
        return $this->db->row('SELECT id, name FROM objects');
    }

    public function add($post){
        $params = [
            'objects_id' => $post['objects_id'],
            'name_protocol' => $post['name_protocol'],
            'number_protocol' => $post['number_protocol'],
            'date' => $post['date'],
        ];
        $this->db->query('INSERT INTO protocols (objects_id, name_protocol, number_protocol, date) VALUES (:objects_id, :name_protocol, :number_protocol, :date)', $params);
        return $this->db->lastInsertId();
    }

    public function isProtocolExists($tag) {
        $params = [
            'tag' => $tag,
        ];
        return $this->db->column('SELECT tag FROM protocols WHERE tag = :tag', $params);
    }

    public function protocolDelete($tag) {
        $params = [
            'tag' => $tag,
        ];
        $this->db->query('DELETE FROM protocols WHERE tag = :tag', $params);
    }

    public function protocolEdit($post, $tag){
        $params = [
            'tag' => $tag,
            'name_protocol' => $post['name_protocol'],
            'number_protocol' => $post['number_protocol'],
            'date' => $post['date'],
        ];
        $this->db->query('UPDATE protocols SET name_protocol = :name_protocol, number_protocol = :number_protocol, date = :date WHERE tag = :tag', $params);
    }

    public function protocolData($tag){
        $params =[
            'tag' => $tag,
        ];
        return $this->db->row('SELECT * FROM protocols WHERE tag = :tag', $params);
    }
}