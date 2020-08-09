<?php

class User_model extends CI_Model{
    public function getUser($pin = null){
        if($pin === null){
            return $this->db->get('user')->result_array();
        }else{
            return $this->db->get_where('user',['user_id' => $pin])->row_array();
        }
    }
}