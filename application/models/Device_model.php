<?php

class Device_model extends CI_Model{
    public function getDevice($id = null){
        if($id === null){
            return $this->db->get('device')->result_array();
        }else{
            return $this->db->get_where('device',['id_device' => $id])->row_array();
        }
    }

    public function deleteDevice($id){
        $this->db->delete('device', ['id_device' => $id]);
        return $this->db->affected_rows();
    }

    public function createDevice(){
        $data = [
            "id_device" => '',
            "nama_device" => $this->input->post('name', true),
            "detak_jantung" => 0,
            "suhu" => 0,
            "kipas" => 0
        ];
        $this->db->insert('device', $data);
    }

    public function updateDevice($data, $id){
        $this->db->update('device', $data, ['id_device' => $id]);
        return $this->db->affected_rows();
    }

    public function searchDevice(){
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_device', $keyword);
        $this->db->or_like('id_device', $keyword);
        return $this->db->get('device')->result_array();
    }
    
}

?>