<?php

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Device_model');

        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
    }

    public function index($nama = ''){
        $data['judul'] = 'Home';
        $data['nama'] = $nama;
        $data['device'] = $this->Device_model->getDevice();
        if ($this->input->post('keyword')) {
            $data['device'] = $this->Device_model->searchDevice();
        }
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar');
        $this->load->view('home/monitoring',$data);
        $this->load->view('home/detail',$data);
        $this->load->view('template/footer');
    }

    public function KontrolOn($id){
        $state = 1;
        $data = [
            "kipas" => $state
        ];
        $this->Device_model->updateDevice($data, $id);
        redirect('Home');
    }

    public function KontrolOff($id){
        $state = 0;
        $data = [
            "kipas" => $state
        ];
        $this->Device_model->updateDevice($data, $id);
        redirect('Home');
    }
}