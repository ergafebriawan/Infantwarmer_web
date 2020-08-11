<?php

class User_model extends CI_Model{
    public function getUser($table, $where){
        return $this->db->get_where($table, $where);
    }

    public function tampilUser($id = null){
        if($id === null){
            return $this->db->get('user')->result_array();
        }else{
            return $this->db->get_where('user',['user_id' => $id])->row_array();
        }
    }

    public function createUser(){
        $data = [
            "user_id" => $this->input->post('user', true),
            "password" => $this->input->post('pass', true)
        ];
        $this->db->insert('user', $data);
    }

    public function deleteUser($id){
        $this->db->delete('user', ['user_id' => $id]);
        return $this->db->affected_rows();
    }

    public function updateUser($data, $id){
        $this->db->update('user', $data, ['user_id' => $id]);
        return $this->db->affected_rows();
    }

    public function searchUser(){
        $keyword = $this->input->post('keyword');
        $this->db->like('user_id', $keyword);
        return $this->db->get('user')->result_array();
    }
}