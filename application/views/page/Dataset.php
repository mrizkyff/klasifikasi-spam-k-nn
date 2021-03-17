<!-- judul halaman -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dataset K-Means Clustering</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dataset SMS</li>
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
    <button class="btn btn-sm btn-success" style="float:right;" data-toggle="modal" data-target="#modal_tambah_dataset"> <i class="fa fa-plus" aria-hidden="true" ></i> Tambah Data</button>
      <h3 class="card-title">Database Dataset<i class="fas fa-rocketchat"></i></h3>
    </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-sm" id="tb_dataset">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th width="50px">ID</th>
                        <th>Teks</th>
                        <th>Hasil Stem</th>
                        <th width="75px">Cluster</th>
                        <th width="75px">Tgl</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody id="show_dataset">
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
  </div>
</div>
<!-- konten utama Dashboard -->


<!-- Modal -->
<div class="modal fade" id="modal_tambah_dataset" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <form id="form_tambah">
                <div class="form-group">
                    <label for="teks_dataset">Teks Isi Pesan</label>
                    <input type="text" class="form-control" id="teks_dataset">
                </div>
                <div class="form-group">
                    <label for="cluster_dataset">Cluster</label>
                    <select name="cluster_dataset" id="cluster_dataset" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" id="btn_tambah_dataset">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>




