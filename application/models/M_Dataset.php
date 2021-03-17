<?php
    class M_Dataset extends CI_Model
    {
        public function get_all_dataset(){
            return $this->db->get('tb_sms')->result_array();
        }
        public function get_dataset(){
            $this->db->select('id, teks');
            return $this->db->get('tb_sms')->result_array();
        }
        public function update_stem_dataset($data_stem){
            return $this->db->update_batch('tb_sms', $data_stem,'id');
        }
        public function update_cluster_predict($data){
            return $this->db->update_batch('tb_sms', $data,'id');
        }
        public function get_cluster1(){
            $this->db->where('cluster_predict','1');
            return $this->db->get('tb_sms')->result_array();
        }
        public function get_cluster2(){
            $this->db->where('cluster_predict','2');
            return $this->db->get('tb_sms')->result_array();
        }
        public function reset_cluster_predict(){
            $data = [
                'cluster_predict' => -1,
            ];
            return $this->db->update('tb_sms', $data);
        }
    }
    
?>