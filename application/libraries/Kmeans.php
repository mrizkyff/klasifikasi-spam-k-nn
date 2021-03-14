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
        $bobotDokumen['q'] = $bobotQuery;

        return $bobotDokumen;
    }

    public static function hitung_euclidean($bobot, $c1, $c2){
        
    }

    public static function jarak_euclidean($bobot, $debug){
        $c1 = 2;
        $c2 = 4;

        $euclidean_distance = [];		
        // menghitung jarak dari c1
        // print_r($bobot);
        // die();
        foreach ($bobot as $id_doc => $value) {
            $temp = 0;	
            foreach ($value as $term => $nilainya) {
                // jarak dari c1
                // print_r([$id_doc => [$term => $nilainya]]);
                if($id_doc == $c1){
                    if(array_key_exists($term, $bobot[$c1])){
                        // print_r([$id_doc => ['sama dengan centroid' => [$term => $nilainya-$nilainya]]]);
                        $temp +=($nilainya-$nilainya);
                    }

                }
                else{
                    // // kalau sama
                    if(array_key_exists($term, $bobot[$c1])){
                        // print_r([$id_doc.'-'.$c1 => ['termnya sama' => [$term => pow(($nilainya - $bobot[$c1][$term]),2)]]]);
                        $temp += pow(($nilainya - $bobot[$c1][$term]),2);
                    }
                    // // kalau di doclist ada, di pusat tidak ada1
                    else if(!array_key_exists($term, $bobot[$c1])){
                        // print_r([$id_doc.'-'.$c1 => ['doclist ada' => [$term => pow($nilainya,2)]]]);
                        $temp += pow($nilainya,2);
                    }
                }
            }
            // // kalau di pusat ada, di doclist tidak ada
            foreach ($bobot[$c1] as $term1 => $value1) {
                if(!array_key_exists($term1, $bobot[$id_doc])){
                    // print_r([$id_doc.'-'.$c1 => ['pusat ada' => [$term1 => pow($bobot[$c1][$term1],2)]]]);
                    $temp += pow($bobot[$c1][$term1],2);
                }
            }
            $euclidean_distance['jarak1'][$id_doc] = sqrt($temp);		
        }

        // menghitung jarak dari Pusat2
        foreach ($bobot as $id_doc => $value) {
            $temp = 0;	
            foreach ($value as $term => $nilainya) {
                // jarak dari c2
                // print_r([$id_doc => [$term => $nilainya]]);
                if($id_doc == $c2){
                    if(array_key_exists($term, $bobot[$c2])){
                        // print_r([$id_doc => ['sama dengan centroid' => [$term => $nilainya-$nilainya]]]);
                        $temp +=($nilainya-$nilainya);
                    }

                }
                else{
                    // // kalau sama
                    if(array_key_exists($term, $bobot[$c2])){
                        // print_r([$id_doc.'-'.$c2 => ['termnya sama' => [$term => pow(($nilainya - $bobot[$c2][$term]),2)]]]);
                        $temp += pow(($nilainya - $bobot[$c2][$term]),2);
                    }
                    // // kalau di doclist ada, di pusat tidak ada1
                    else if(!array_key_exists($term, $bobot[$c2])){
                        // print_r([$id_doc.'-'.$c2 => ['doclist ada' => [$term => pow($nilainya,2)]]]);
                        $temp += pow($nilainya,2);
                    }
                }
            }
            // // kalau di pusat ada, di doclist tidak ada
            foreach ($bobot[$c2] as $term1 => $value1) {
                if(!array_key_exists($term1, $bobot[$id_doc])){
                    // print_r([$id_doc.'-'.$c2 => ['pusat ada' => [$term1 => pow($bobot[$c2][$term1],2)]]]);
                    $temp += pow($bobot[$c2][$term1],2);
                }
            }
            $euclidean_distance['jarak2'][$id_doc] = sqrt($temp);		
        }

        print_r($euclidean_distance);

    }
}

?>