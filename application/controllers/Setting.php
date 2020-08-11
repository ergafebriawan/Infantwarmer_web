<?php
class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
    }
    public function index($nama = '')
    {
        $data['judul'] = 'List User';
        $data['nama'] = $nama;
        $data['user'] = $this->User_model->tampilUser();
        if ($this->input->post('keyword')) {
            $data['user'] = $this->User_model->searchUser();
        }
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('pass', 'Pass', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar');
            $this->load->view('setting/index', $data);
            $this->load->view('setting/TambahUser');
            $this->load->view('template/footer');
        } else {
            $this->User_model->createUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Setting');
        }
    }

    public function delete($id)
    {
        $this->User_model->deleteUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Setting');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        $data['user'] = $this->User_model->tampilUser($id);
        $this->form_validation->set_rules('passEdit', 'Pass', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('setting/EditUser', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                "password" => $this->input->post('passEdit', true)
            ];
            $this->User_model->updateUser($data, $id);
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('Setting');
        }
    }
}
