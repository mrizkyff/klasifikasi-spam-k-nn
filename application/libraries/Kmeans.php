<?php

class Kmeans
{
    public static function halo(){
        return 'halo';
    }
    public static function get_rank($query, $dokumen, $debug=false)
    {
        $term           = Kmeans::term($query, $dokumen, $debug);
        $dokumen_term   = Kmeans::dokumen_term($dokumen, $debug);
        $df             = Kmeans::df($term, $query, $dokumen_term, $debug);
        $idf            = Kmeans::idf($query, $dokumen_term, $df, $debug);
        $bobot          = Kmeans::bobot($query, $dokumen_term, $idf, $debug);
        $euclidean      = Kmeans::jarak_euclidean($bobot, $debug);


        return $euclidean;
    }

    public static function term($query, $dokumen, $debug)
    {
        // query to string
        $query = implode(" ",  $query);

        // dokumen to array | remove nested array karna bentuk sebelumnya tu nested array
        $arrayTampung = [];
        foreach ($dokumen as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if ($key1 == 'stem') {
                    array_push($arrayTampung, $value1);
                }
            }
        }

        // menggabungkan query pencarian ke term dokumen
        array_push($arrayTampung, $query);

        // semua value $arrayTampung jadi satu string
        $string_term = implode(" ", $arrayTampung);
        // semua string jadi array | untuk mendapatkan term
        $string_array = explode(" ", $string_term);

        // mendapatkan term
        $word       = str_word_count($string_term, 1); // auto string to array
        $term       = array_count_values($word);

        if ($debug){
            var_dump('--------term--------');
            print_r($term);
        }

        return $term;
    }

    public static function dokumen_term($dokumen, $debug)
    {
        $arrayTampung = [];
        foreach ($dokumen as $key => $value) {
            // semua string jadi array | untuk mendapatkan term
            $string_array = explode(" ", $value['stem']);
            // mendapatkan term
            $word       = str_word_count($value['stem'], 1); // auto string to array
            $term       = array_count_values($word);
            array_push($arrayTampung, ['id_doc' => $value['id_doc'], 'stem' => $term]);
        }
        if ($debug){
            var_dump('--------dokumen term--------');
            print_r($arrayTampung);
        }
        return $arrayTampung;
    }


    public static function df($term, $query, $dokumen_term, $debug)
    {
        // start from 0 | start dari nol
        $arrayDf = [];
        foreach ($term as $key => $value) {
            $arrayDf[$key] = 0;
        }

        // pengisian df dari $query
        foreach ($term as $key => $value) {
            foreach ($query as $key1 => $value1) {
                if ($key == $value1) {
                    $arrayDf[$key] += 1;
                }
            }
        }

        // pengisian df dari dokumen
        foreach ($term as $key => $value) {
            foreach ($dokumen_term as $key1 => $value1) {
                foreach ($value1['stem'] as $key2 => $value2) {
                    if ($key == $key2) {
                        $arrayDf[$key] += 1;
                    }
                }
            }
        }
        if ($debug){
            var_dump('-------- df (seluruh term/leksikon) --------');
            print_r($arrayDf);
        }
        return $arrayDf;
    }

    public static function idf($query, $dokumen_term, $df, $debug)
    {
        // n = jumlah dokumen + query
        $N_count = count($dokumen_term) + 1;

        $arrayIdf =[];
        foreach ($df as $key => $value) {
            if($value <= 0.0){

            }
            else{
                $arrayIdf[$key] = log10( $N_count / $value);
            }
        }

        if ($debug){
            var_dump('-------- idf --------');
            print_r($arrayIdf);
        }
        return $arrayIdf;
    }

    public static function bobot($query, $dokumen_term, $idf, $debug)
    {
        // pembobotan query
        $bobotQuery =[];
        foreach ($idf as $key => $value) {
            foreach ($query as $key1 => $value1) {
                if ($key == $value1) {
                    $bobotQuery[$key] = (1*$value);
                }
            }
        }

        // pembobotan setiap dokumen
        $bobotDokumen = [];
        foreach ($dokumen_term as $index => $dokumen) {
            $arrayTampung = [];
            foreach ($idf as $key => $value) {
                foreach ($dokumen['stem'] as $key1 => $value1) {
                    if ($key == $key1) {
                        $arrayTampung += [$key => ($value*$value1),];
                    }
                }
            }
            // array_push($bobotDokumen, array('id_doc' => $dokumen['id_doc'], "stem" => $arrayTampung));
            $bobotDokumen[$dokumen['id_doc']] = $arrayTampung;
        }

        // Array Bobot
        // $arrayBobot = ["query" => $bobotQuery, "stem" => $bobotDokumen];
        // array_push($bobotDokumen, array('id_doc' => 'q', 'stem' => '123'));
        $bobotDokumen['1'] = $bobotQuery;

        return $bobotDokumen;
    }

    public static function hitung_euclidean($bobot, $centroid, $cbaru = null){
        if($cbaru == null){
            $c = $bobot[$centroid];
        }
        else{
            $c = $centroid;
        }
        
        $euclidean_distance = [];		
        foreach ($bobot as $id_doc => $value) {
            $temp = 0;	
            foreach ($value as $term => $nilainya) {
                // jarak dari centroid
                // print_r([$id_doc => [$term => $nilainya]]);
                if($id_doc == $centroid){
                    if(array_key_exists($term, $c)){
                        // print_r([$id_doc => ['sama dengan centroid' => [$term => $nilainya-$nilainya]]]);
                        $temp +=($nilainya-$nilainya);
                    }

                }
                else{
                    // // kalau sama
                    if(array_key_exists($term, $c)){
                        // print_r([$id_doc.'-'.$centroid => ['termnya sama' => [$term => pow(($nilainya - $c[$term]),2)]]]);
                        $temp += pow(($nilainya - $c[$term]),2);
                    }
                    // // kalau di doclist ada, di pusat tidak ada1
                    else if(!array_key_exists($term, $c)){
                        // print_r([$id_doc.'-'.$centroid => ['doclist ada' => [$term => pow($nilainya,2)]]]);
                        $temp += pow($nilainya,2);
                    }
                }
            }
            // // kalau di pusat ada, di doclist tidak ada
            foreach ($c as $term1 => $value1) {
                if(!array_key_exists($term1, $bobot[$id_doc])){
                    // print_r([$id_doc.'-'.$centroid => ['pusat ada' => [$term1 => pow($c[$term1],2)]]]);
                    $temp += pow($c[$term1],2);
                }
            }
            $euclidean_distance['jarak'][$id_doc] = sqrt($temp);		
        }
        return $euclidean_distance;
    }


    public static function bagi_cluster($jarak1, $jarak2){
        $cluster1 = [];
        $cluster2 = [];
        // print_r($jarak1);
        // die();
        foreach ($jarak1 as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if($value1 < $jarak2[$key][$key1]){
                    $cluster1[] = $key1;
                }
                else if($value1 > $jarak2[$key][$key1]){
                    $cluster2[] = $key1;
                }
                // print_r([$jarak2[$key][$key1]]);
            }
        }
        return array(
            'cluster1' => $cluster1,
            'cluster2' => $cluster2
        );
    }

    public static function hitung_centroid($cluster, $bobot){
        $means = [];

        $n = count($cluster);
        $sum = [];
        foreach($cluster as $key=>$value){
            foreach ($bobot as $key1 => $value1) {
                foreach ($value1 as $key2 => $value2) {
                    if($key1 == $value){
                        // kalau di kedua dokumen ada nilainya, langsung assign 0, biar bisa di tambahkan nilainya (first value)
                        $sum[$key2] = 0;
                    }
                    // print_r([$key2 => $value2]);
                }
            }
        }
        foreach($cluster as $key=>$value){
            foreach ($bobot as $key1 => $value1) {
                foreach ($value1 as $key2 => $value2) {
                    if($key1 == $value){
                        $sum[$key2] += $value2;
                    }
                    // print_r([$key2 => $value2]);
                }
            }
        }
        
        foreach ($sum as $key => $value) {
            $means[$key] = ($n == 0) ? 1 : $value / $n;
        }

        // print_r($means);
        // die();

        return $means;
    }

    public static function jarak_euclidean($bobot, $debug){

        // print_r(['bobot' => $bobot]);
        // ITERASI 1
        print_r(['--- iterasi 1 ---']);
        $c1 = 2100;
        $c2 = 2101;

        $cluster1 = Kmeans::hitung_euclidean($bobot, $c1);
        $cluster2 = Kmeans::hitung_euclidean($bobot, $c2);
        // print_r($cluster1);
        // print_r($cluster2);

        $hasil_clustering = Kmeans::bagi_cluster($cluster1, $cluster2);
        // print_r($hasil_clustering);

        $c1_temp = $hasil_clustering['cluster1'];
        $c2_temp = $hasil_clustering['cluster2'];
        
        // ITERASI 2 DST
        $hasil_clustering_baru = [];

        $x = 1;
        do {
            // print_r(['--- iterasi '.$x.' ---']);
            $x+=1;
            $centroid1_baru = Kmeans::hitung_centroid($c1_temp, $bobot);
            $centroid2_baru = Kmeans::hitung_centroid($c2_temp, $bobot);
            
            // print_r($centroid1_baru);
            // print_r($centroid2_baru);
            $cluster_baru1 = Kmeans::hitung_euclidean($bobot, $centroid1_baru, 'baru');
            $cluster_baru2 = Kmeans::hitung_euclidean($bobot, $centroid2_baru, 'baru');
            
            // print_r($cluster_baru1);
            // print_r($cluster_baru2);
            
            $hasil_clustering_baru = Kmeans::bagi_cluster($cluster_baru1, $cluster_baru2);
            // print_r($hasil_clustering_baru);
            
            $c1_temp = $hasil_clustering_baru['cluster1'];
            $c2_temp = $hasil_clustering_baru['cluster2'];

            // print_r(['sama?' => ($hasil_clustering === $hasil_clustering_baru)]);
        } while (($hasil_clustering === $hasil_clustering_baru) != 1);
        print_r($hasil_clustering_baru);


        // $cluster_baru2 = Kmeans::hitung_euclidean($bobot, $c2, $centroid2_baru);



    }
}

?>