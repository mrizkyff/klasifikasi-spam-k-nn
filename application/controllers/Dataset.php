<?php
    class Dataset extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Dataset', 'dataset');
        }
        public function index(){
            $this->load->view('templates/header');
            $this->load->view('page/Dataset');
            $this->load->view('templates/menu_bar');
            $this->load->view('templates/footer');
            $this->load->view('page/script/dataset');
        }
        public function get_all_dataset(){
            $data = $this->dataset->get_all_dataset();
            echo json_encode($data);
        }
        public function simpan(){
            $tanggal = date("Y/m/d");
            $teks = $this->input->post('teks');
            $cluster = $this->input->post('cluster');
            $data = [
                'teks' => $teks,
                'stem' => implode(' ',$this->preprocessing->preprocess($teks)),
                'cluster' => $cluster,
                'tanggal' => $tanggal,
            ];
            $data = $this->dataset->save_dataset($data);
            echo json_encode($data);
        }
        public function hapus(){
            $id = $this->input->post('id');
            $data = $this->dataset->delete_dataset($id);
            echo json_encode($data);
        }
        public function edit(){
            $tanggal = date("Y/m/d");
            $id = $this->input->post('id');
            $teks = $this->input->post('teks');
            $cluster = $this->input->post('cluster');
            $data = [
                'teks' => $teks,
                'stem' => implode(' ',$this->preprocessing->preprocess($teks)),
                'cluster' => $cluster,
                'tanggal' => $tanggal
            ];
            $data = $this->dataset->update_dataset($data, $id);
            echo json_encode($data);
        }
    }
    
?>
