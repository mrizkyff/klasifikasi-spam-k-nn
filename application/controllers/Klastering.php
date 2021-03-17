<?php
    class Klastering extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Dataset', 'dataset');
    
        }
        public function index(){
            $data['query'] = $this->input->post('query');
            $data['hasil_cluster']['kesimpulan'] = '';
            if(isset($data['query'])){
                $data['hasil_cluster'] = $this->proses_klastering($data['query']);
            }

            $data['dataset'] = $this->dataset->get_dataset();
            $data['cluster1_db'] = $this->dataset->get_cluster1();
            $data['cluster2_db'] = $this->dataset->get_cluster2();

            $this->load->view('templates/header');
            $this->load->view('page/Clustering', $data);
            $this->load->view('templates/menu_bar');
            $this->load->view('templates/footer');
            $this->load->view('page/script/clustering');
            // reset cluster predict
            $this->dataset->reset_cluster_predict();
            // ke ajax
            // echo json_encode($data['hasil_cluster']);
        }
        public function generate_stem(){
            // panggil semua data dari database
            $data_sms = $this->dataset->get_all_dataset();
            // isi data_stem dengan id dan teks yang sudah di preprocessing
            $data_stem = [];
            foreach ($data_sms as $key => $value) {
                $data_stem[] = array(
                    'id' => $value['id'],
                    'stem' => implode(' ',$this->preprocessing->preprocess($value['teks']))
                );
            }
            $status = 0;
            if($this->dataset->update_stem_dataset($data_stem)){
                $status = 1;
            }
            echo json_encode($status);
        }
        public function proses_klastering($query){
            // Langkah 1 get query lalu lakukan preprocessing
            // $query = 'mata uang rupiah';
            // $query = 'olahraga pandemi';
            // $query = 'tugas kuliah lagi deadline mahasiswa';
            // $query = $this->input->post('query');
            $query = $this->preprocessing->preprocess($query);
            // print_r($query);
            
            // Langkah 2 panggil semua dataset 
            $koleksi_data_sms = $this->dataset->get_all_dataset();
            // ubah bentuk dataset kedalam bentuk array 
            $arrayData = [];
            foreach ($koleksi_data_sms as $key) {
                $arrayDoc = [
                    'id_doc' => $key['id'],
                    'stem' => $key['stem']
                ];
                array_push($arrayData, $arrayDoc);
            }
            // print_r($arrayData);

            // Langkah 3 proses perhitungan kmeans
            $hasil = $this->kmeans->get_rank($query, $arrayData);

            // Langkah 4 update nilai cluster di database
            $data_batch = [];
            foreach ($hasil['hasil_clustering']['cluster1'] as $key => $value) {
                if($value != '1'){
                    // print_r([$value => '1']);
                    $data_batch[] = array (
                        'id' => $value,
                        'cluster_predict' => '1',
                    );
                }
            }
            foreach ($hasil['hasil_clustering']['cluster2'] as $key => $value) {
                if($value != '1'){
                    // print_r([$value => '2']);
                    $data_batch[] = array (
                        'id' => $value,
                        'cluster_predict' => '2',
                    );
                }
            }
            $this->dataset->update_cluster_predict($data_batch);

            // print_r($hasil);
            return $hasil;
            // echo json_encode($hasil);
        }
    }
    
?>