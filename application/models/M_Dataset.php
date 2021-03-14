<?php
    class M_Dataset extends CI_Model
    {
        public function get_all_dataset(){
            return $this->db->get('db_sms')->result_array();
        }
        public function update_stem_dataset($data_stem){
            return $this->db->update_batch('db_sms', $data_stem,'id');
        }
    }
    
?>