<?php
    class Login extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Login','login');
        }
        public function index(){
            $this->load->view('templates/header');
            $this->load->view('page/login');
            $this->load->view('templates/footer');
        }
        public function aksi_login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = [
                'username' => $username,
                'password' => $password
            ];
            $cek_login = $this->login->cek_login($data);
            if($cek_login >= 1){
                $this->session->set_userdata('status_login','telah_login');
                redirect(base_url("dataset"));
            }
            else{
                redirect(base_url("login"));
            }
        }
        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url("login"));
        }
    }
    
?>