<?php

class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'User');
    }

    public function index(){
        $this->load->view('template/header');
        $this->load->view('login/index');
        $this->load->view('template/footer');
    }

    public function proses_login(){
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->User->getUser("user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect(base_url('login'));
    }
}

?>