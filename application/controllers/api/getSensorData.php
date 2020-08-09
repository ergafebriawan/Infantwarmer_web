<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class getSensorData extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Device_model', 'Device');
    }

    public function index_get(){
        $id = $this->get('id_device');
        $data = [
            'nama_device' =>  $this->get('nama_device'),
            'detak_jantung' => $this->get('detak_jantung'),
            'suhu' => $this->get('suhu'),
            'kipas' => $this->get('kipas')
        ];

        echo $id;
        echo json_encode($data);
        
        if($this->Device->updateDevice($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'Device updated'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update device'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

?>