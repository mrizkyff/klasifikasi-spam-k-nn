<?php
    class Guest extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Dataset','dataset');
        }
        public function index(){   
            $this->load->view('templates/header');
            $this->load->view('page/Guest');
            $this->load->view('templates/footer');
            $this->load->view('page/script/guest');
        }
        public function proses_klastering(){
            // Langkah 1 get query lalu lakukan preprocessing
            // $query = 'mata uang rupiah';
            // $query = 'olahraga pandemi';
            // $query = 'tugas kuliah lagi deadline mahasiswa';
            $c1 = 2;
            $c2 = 45;
            $query = $this->input->post('query');
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
            $hasil = $this->kmeans->get_rank($query, $arrayData, $c1, $c2);


            // print_r($hasil);
            // return $hasil;
            echo json_encode($hasil);
        }
    }
    
?>