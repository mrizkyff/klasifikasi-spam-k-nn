<?php
    class M_Login extends CI_Model
    {
        public function cek_login($data){
            return $this->db->get_where("pengguna",$data)->num_rows();
        }
    }
    
?>