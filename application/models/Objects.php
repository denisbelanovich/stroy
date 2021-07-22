<?php

namespace application\models;

use application\core\Model;

class Objects extends Model
{
    public $error;

    public function objectValidate($post){
        if(empty($post['name']) or empty($post['status'])){
            $this->error = 'Все поля должны быть заполнены!';
            return false;
        }
        return true;
    }

    public function add($post){
        $params = [
            'accounts_id' => $post['accounts_id'],
            'name' => $post['name'],
            'status' => $post['status'],
        ];
        $this->db->query('INSERT INTO objects (accounts_id, name, status) VALUES (:accounts_id, :name, :status)', $params);
        return $this->db->lastInsertId();
    }

    public function get($accounts_id){
        $params =[
            'accounts_id' => $accounts_id,
        ];
        return $this->db->row('SELECT id, name, status FROM objects WHERE accounts_id = :accounts_id', $params);
    }

    public function getCount($accounts_id)
    {
        $params =[
        'accounts_id' => $accounts_id,
    ];
        return $this->db->row('SELECT COUNT(*) as count FROM objects WHERE accounts_id = :accounts_id', $params);
    }

    public function isObjectExists($id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM objects WHERE id = :id', $params);
    }

    public function objectDelete($id) {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM objects WHERE id = :id', $params);
    }

    public function objectEdit($post, $id){
        $params = [
            'id' => $id,
            'name' => $post['name'],
            'status' => $post['status'],
        ];
        $this->db->query('UPDATE objects SET name = :name, status = :status WHERE id = :id', $params);
    }

    public function objectData($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM objects WHERE id = :id', $params);
    }

    public function checkObjectExists($name){
        $params = [
            'name' => $name,
        ];
        if($this->db->column('SELECT id FROM objects WHERE name = :name', $params)){
            $this->error = 'Объект с таким названием уже создан!';
            return false;
        }
        return true;
    }
}