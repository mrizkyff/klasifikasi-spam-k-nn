<?php
    class M_Dataset extends CI_Model
    {
        public function get_all_dataset(){
            return $this->db->get('skripsi_analisa')->result_array();
        }
        public function update_stem_dataset($data_stem){
            return $this->db->update_batch('skripsi_analisa', $data_stem,'id');
        }
    }
    
?>