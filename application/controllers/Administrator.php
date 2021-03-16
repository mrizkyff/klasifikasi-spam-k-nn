<?php
    class Administrator extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            if($this->session->userdata('status_login') != 'telah_login'){
                redirect(base_url("login"));
            }
        }
        public function index(){
            $this->load->view('templates/header');
            $this->load->view('page/Administrator');
            $this->load->view('templates/menu_bar');
            $this->load->view('templates/footer');
        }
    }
    
?>