<?php
    class Klastering extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Dataset', 'dataset');
    
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
            if($this->dataset->update_stem_dataset($data_stem)){
                echo 'sukses isi stem!';
            }
        }
        public function proses_klastering(){
            // Langkah 1 get query lalu lakukan preprocessing
            $query = 'mata uang rupiah';
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
            print_r($hasil);
        }
    }
    
?>