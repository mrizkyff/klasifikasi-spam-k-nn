<?php
    // print_r($hasil_cluster['hasil_clustering']['cluster1']);
    // die();
    // var_dump($cluster1_db);
    $query = 'mata uang rupiah';
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
      <h3 class="card-title">Simulasi<i class="fas fa-rocketchat    "></i></h3>
    </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="<?php echo base_url('klastering/index')?>" method="post">
                <table width="100%">
                    <tr>
                        <td width="150px">Query</td>
                        <td><input type="text" placeholder="Isi Pesan sebagai Query" class="form-control"></td>
                        <td width="150px"><input type='submit' class="btn btn-primary" value="Hitung Cluster"></td>
                    </tr>
                </table>
            </form>
            <div class="row mt-3">
                <div class="col">
                    <h3>Cluster 1</h3>
                    <table id="tb_cluster1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                                <th>Isi Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(in_array('1', $hasil_cluster['hasil_clustering']['cluster1'])){
                            ?>
                                <tr>
                                    <td><?= '1' ?></td>
                                    <td><?= $query ?></td>
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
                                </tr>
                            <?php      
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h3>Cluster 2</h3>
                    <table id="tb_cluster2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                                <th>Isi Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(in_array('1', $hasil_cluster['hasil_clustering']['cluster2'])){
                            ?>
                                <tr>
                                    <td><?= '1' ?></td>
                                    <td><?= $query ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                                foreach ($cluster2_db as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['teks'] ?></td>
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






