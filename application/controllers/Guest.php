<?php
    class Guest extends CI_Controller
    {
        public function index(){   
            $this->load->view('templates/header');
            $this->load->view('page/Guest');
            $this->load->view('templates/footer');
            $this->load->view('page/script/guest');
        }
    }
    
?>