<?php

namespace application\models;

use application\core\Model;

class Representatives extends Model
{
    public $error;

    public function representativesValidate($post){
        if(empty($post['position']) or empty($post['name_orgs']) or empty($post['fio'])){
            $this->error = 'Все поля должны быть заполнены!';
            return false;
        }
        return true;
    }

    public function get()
    {
        return $this->db->row('SELECT * FROM representatives');
    }

    public function getCount()
    {
        return $this->db->row('SELECT objects_id, COUNT(*) as count FROM representatives GROUP BY objects_id');
    }

    public function getObject()
    {
        return $this->db->row('SELECT id, name FROM objects');
    }

    public function add($post){
        $params = [
            'objects_id' => $post['objects_id'],
            'position' => $post['position'],
            'name_orgs' => $post['name_orgs'],
            'fio' => $post['fio'],
        ];
        $this->db->query('INSERT INTO representatives (objects_id, position, name_orgs, fio) VALUES (:objects_id, :position, :name_orgs, :fio)', $params);
        return $this->db->lastInsertId();
    }

    public function isRepresentativesExists($tag) {
        $params = [
            'tag' => $tag,
        ];
        return $this->db->column('SELECT tag FROM representatives WHERE tag = :tag', $params);
    }

    public function representativesDelete($tag) {
        $params = [
            'tag' => $tag,
        ];
        $this->db->query('DELETE FROM representatives WHERE tag = :tag', $params);
    }

    public function representativesEdit($post, $tag){
        $params = [
            'tag' => $tag,
            'position' => $post['position'],
            'name_orgs' => $post['name_orgs'],
            'fio' => $post['fio'],
        ];
        $this->db->query('UPDATE representatives SET position = :position, name_orgs = :name_orgs, fio = :fio WHERE tag = :tag', $params);
    }

    public function RepresentativesData($tag){
        $params =[
            'tag' => $tag,
        ];
        return $this->db->row('SELECT * FROM representatives WHERE tag = :tag', $params);
    }
}