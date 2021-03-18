<?php
    class Precision extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Dataset','dataset');
        }
        public function index(){
            $this->load->view('templates/header');
            $this->load->view('page/Precision');
            $this->load->view('templates/menu_bar');
            $this->load->view('templates/footer');
            $this->load->view('page/script/precision');
        }
        public function get_jumlah_dataset(){
            $data = $this->dataset->get_jumlah_dataset();
            echo json_encode($data);
        }
        public function proses_klastering($query, $c1, $c2){
            $query = $this->preprocessing->preprocess($query);
            
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

            // Langkah 3 proses perhitungan kmeans
            $hasil = $this->kmeans->get_rank($query, $arrayData, $c1, $c2);

            // Langkah 4 update nilai cluster di database
            $data_batch = [];
            $cluster_predict = 0;
            foreach ($hasil['hasil_clustering']['cluster1'] as $key => $value) {
                if($value != '1'){
                    $data_batch[] = array (
                        'id' => $value,
                        'cluster_predict' => '1',
                    );
                }
                else if($value == '1'){
                    $cluster_predict = 1;
                }
            }
            foreach ($hasil['hasil_clustering']['cluster2'] as $key => $value) {
                if($value != '1'){
                    $data_batch[] = array (
                        'id' => $value,
                        'cluster_predict' => '2',
                    );
                }
                else if($value == '1'){
                    $cluster_predict = 2;
                }
            }
            $this->dataset->update_cluster_predict($data_batch);

            return $cluster_predict;
        }
        public function hitung(){
            $jml_data = $this->dataset->get_jumlah_dataset();
            // $c1 = 2;
            // $c2 = 45;
            $c1 = $this->input->post('c1');
            $c2 = $this->input->post('c2');
            $all_dataset = $this->dataset->get_all_dataset();
            // true positif
            $tp = 0;
            // false positif
            $fp = 0;
            // false negatif
            $fn = 0;
            // true negatif
            $tn = 0;
            foreach ($all_dataset as $key => $value) {
                $predict = $this->proses_klastering($value['stem'], $c1, $c2);
                // print_r(['predict' => $predict]);
                // jika true positif (cluster == 2, predict == 2)
                if($predict == '2' && $value['cluster'] == '2'){
                    $tp += 1;
                }
                // jika false positif (cluster == 1, predict == 2)
                else if($predict == '2' && $value['cluster'] == '1'){
                    $fp += 1;
                }
                // jika false negatif (cluster == 2, predict == 1)
                else if($predict == '1' && $value['cluster'] == '2'){
                    $fn += 1;
                }
                // jika true negatif
                else if($predict == '1' && $value['cluster'] == '1'){
                    $tn += 1;
                }
            }
            $jml_positif = $tp+$fn;
            $jml_negatif = $fp+$tn;
            $data = ([
                'tp' => $tp,
                'fp' => $fp,
                'fn' => $fn,
                'tn' => $tn,
                'jml_positif' => $jml_positif,
                'jml_negatif' => $jml_negatif,
                'jml_data' => $jml_data,
                'precision' => ($tp/($fp+$tp)*100),
                'recall' => ($tp/($fn+$tp)*100),
            ]);
            echo json_encode($data);
            // reset cluster predict
            // $this->dataset->reset_cluster_predict();
        }
    }
    
?>