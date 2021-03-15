<?php
    class Halo extends CI_Controller
    {
        public function index(){
            echo 'selamat malam!';
            // VERSI SASTRAWI
            $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
            $stemmer = $stemmerFactory->createStemmer();
            // key itu id/nama dokumen nya, value itu stringnya
            echo $stemmer->stem('menanam');
        }
    }
    
?>