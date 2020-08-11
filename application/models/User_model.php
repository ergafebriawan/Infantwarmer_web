<?php

class User_model extends CI_Model{
    public function getUser($table, $where){
        return $this->db->get_where($table, $where);
    }
}