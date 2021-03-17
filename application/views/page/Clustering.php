<?php
    // print_r($hasil_cluster['hasil_clustering']['cluster1']);
    // die();
    // var_dump($cluster1_db);
    // var_dump($query);
    // var_dump($hasil_cluster['kesimpulan']);
    // $query = 'mata uang rupiah';
?>
<!-- judul halaman -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">K-Means Clustering</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simulasi K-Means</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- akhir judul halaman -->

<!-- konten utama Dashboard -->
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Simulasi<i class="fas fa-rocketchat"></i></h3><input type="submit" class="btn btn-primary btn-sm" id="btn_generate" style="float: right;" value="Generate Stem">
    </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="<?php echo base_url('klastering/index')?>" method="post">
                <table width="100%">
                    <tr>
                        <td width="150px">Query</td>
                        <td>
                            <input type="text" placeholder="Isi Pesan sebagai Query" class="form-control <?php echo ($hasil_cluster['kesimpulan'] == 'real') ? 'is-valid': (($hasil_cluster['kesimpulan'] == 'spam') ? 'is-invalid' : '')?>" name="query" value="<?php echo isset($query) ?  $query : ''?>">
                            <?php
                                echo (($hasil_cluster['kesimpulan']) == '') ? '<small id="pesan_kategori" class="form-text text-muted">Kategori pesan akan muncul di sini </small>' : '';
                            ?>
                            
                            <div class="valid-feedback">
                                <p>Pesan tersebut termasuk cluster <b><?php echo $hasil_cluster['kesimpulan']?></b></p>
                            </div>
                            <div class="invalid-feedback">
                                <p>Pesan tersebut termasuk cluster <b><?php echo $hasil_cluster['kesimpulan']?></b></p>
                            </div>
                        </td>
                        
                        <td width="150px" style="vertical-align: top;"><input type='submit' class="btn btn-primary" value="Hitung Cluster" id="btn_hitung_cluster"></td>
                    </tr>
                </table>
            </form>
            <div class="row mt-3">
                <div class="col">
                    <h3>Cluster 1</h3>
                    <table id="tb_cluster1" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                                <th>Isi Pesan</th>
                                <th>Cluster</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($hasil_cluster['hasil_clustering'])){
                                    if(in_array('1', $hasil_cluster['hasil_clustering']['cluster1'])){
                            ?>
                                <tr>
                                    <td><?= 'query' ?></td>
                                    <td><?= $query ?></td>
                                    <td><?= '-'?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                                foreach ($cluster1_db as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['teks'] ?></td>
                                    <td><?= $value['cluster'] ?></td>
                                </tr>
                            <?php      
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h3>Cluster 2</h3>
                    <table id="tb_cluster2" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                                <th>Isi Pesan</th>
                                <th>Cluster</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($hasil_cluster['hasil_clustering'])){
                                    if(in_array('1', $hasil_cluster['hasil_clustering']['cluster2'])){
                            ?>
                                <tr>
                                    <td><?= 'query' ?></td>
                                    <td><?= $query ?></td>
                                    <td><?= '-'?></td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                            <?php
                                foreach ($cluster2_db as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['teks'] ?></td>
                                    <td><?= $value['cluster'] ?></td>
                                </tr>
                            <?php      
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
  </div>
</div>
<!-- konten utama Dashboard -->






