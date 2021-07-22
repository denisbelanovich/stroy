<?php

namespace application\models;

use application\core\Model;

class Projects extends Model
{
//    public function get($accounts_id)
//    {
//        $params =[
//            'accounts_id' => $accounts_id,
//        ];
//        return $this->db->row('SELECT tag, objects_id, name_porg, cypher, number_list, date FROM projects WHERE accounts_id =: accounts_id', $params);
//    }
    public function get()
    {
        return $this->db->row('SELECT * FROM projects');
    }
    public function getCount()
    {
        return $this->db->row('SELECT objects_id, COUNT(*) as count FROM projects GROUP BY objects_id');
    }

    public function getObject()
    {
        return $this->db->row('SELECT id, name FROM objects');
    }

    public function add($post){
        $params = [
            'objects_id' => $post['objects_id'],
            'accounts_id' => $post['accounts_id'],
            'name_porg' => $post['name_porg'],
            'cypher' => $post['cypher'],
            'number_list' => 'лист № '.$post['number_list'],
            'date' => $post['date'],
        ];
        $this->db->query('INSERT INTO projects (objects_id, accounts_id, name_porg, cypher, number_list, date) VALUES (:objects_id, :accounts_id, :name_porg, :cypher, :number_list, :date)', $params);
        return $this->db->lastInsertId();
    }

    public function isProjectExists($tag) {
        $params = [
            'tag' => $tag,
        ];
        return $this->db->column('SELECT tag FROM projects WHERE tag = :tag', $params);
    }

    public function projectDelete($tag) {
        $params = [
            'tag' => $tag,
        ];
        $this->db->query('DELETE FROM projects WHERE tag = :tag', $params);
    }

    public function projectEdit($post, $tag){
        $params = [
            'tag' => $tag,
            'name_porg' => $post['name_porg'],
            'cypher' => $post['cypher'],
            'number_list' => $post['number_list'],
            'date' => $post['date'],
        ];
        $this->db->query('UPDATE projects SET name_porg = :name_porg, cypher = :cypher, number_list = :number_list, date = :date WHERE tag = :tag', $params);
    }

    public function projectData($tag){
        $params =[
            'tag' => $tag,
        ];
        return $this->db->row('SELECT * FROM projects WHERE tag = :tag', $params);
    }
}