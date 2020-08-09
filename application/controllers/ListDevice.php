<?php
class ListDevice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Device_model');
        $this->load->library('form_validation');
    }
    public function index($nama = '')
    {
        $data['judul'] = 'List Device';
        $data['nama'] = $nama;
        $data['device'] = $this->Device_model->getDevice();
        if ($this->input->post('keyword')) {
            $data['device'] = $this->Device_model->searchDevice();
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar');
            $this->load->view('device/index', $data);
            $this->load->view('device/TambahDevice');
            $this->load->view('template/footer');
        } else {
            $this->Device_model->createDevice();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('ListDevice');
        }
    }

    public function delete($id)
    {
        $this->Device_model->deleteDevice($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('ListDevice');
    }

    public function edit($id)
    {
        $data['judul'] = 'List Device';
        $data['device'] = $this->Device_model->getDevice($id);
        $this->form_validation->set_rules('nameEdit', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('device/EditDevice', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                "nama_device" => $this->input->post('nameEdit', true)
            ];
            $this->Device_model->updateDevice($data, $id);
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('ListDevice');
        }
    }
}
