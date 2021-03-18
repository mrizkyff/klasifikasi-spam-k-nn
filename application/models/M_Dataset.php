<?php
    class M_Dataset extends CI_Model
    {
        public function get_all_dataset(){
            return $this->db->get('sms_fix')->result_array();
        }
        public function get_dataset(){
            $this->db->select('id, teks');
            return $this->db->get('sms_fix')->result_array();
        }
        public function update_stem_dataset($data_stem){
            return $this->db->update_batch('sms_fix', $data_stem,'id');
        }
        public function update_cluster_predict($data){
            return $this->db->update_batch('sms_fix', $data,'id');
        }
        public function get_cluster1(){
            $this->db->where('cluster_predict','1');
            return $this->db->get('sms_fix')->result_array();
        }
        public function get_cluster2(){
            $this->db->where('cluster_predict','2');
            return $this->db->get('sms_fix')->result_array();
        }
        public function reset_cluster_predict(){
            $data = [
                'cluster_predict' => -1,
            ];
            return $this->db->update('sms_fix', $data);
        }
        public function save_dataset($data){
            return $this->db->insert('sms_fix', $data);	
        }
        public function delete_dataset($id){
            $this->db->where('id',$id);
			return $this->db->delete('sms_fix');
        }
        public function update_dataset($data,$id){
            $this->db->where('id',$id);
			return $this->db->update('sms_fix',$data);
        }
        function json(){
            $this->load->library('datatables');
            $this->datatables->select('id, teks, stem, cluster, tanggal');
            $this->datatables->from('sms_fix');
            $this->datatables->add_column('aksi','<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="$1" data-teks="$2" data-cluster="$3">Edit</a>
            <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="$1" data-teks="$2">Delete</a>
            ','id, teks, cluster');
            return $this->datatables->generate();
        }
    }
    
?>