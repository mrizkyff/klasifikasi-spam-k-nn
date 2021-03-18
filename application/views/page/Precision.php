<!-- judul halaman -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pengujian Model (Precision dan Recall)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Precision</li>
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
        <button class="btn btn-sm btn-info" style="float:right;" id="btn_precision"> <i class="fa fa-square-root-alt" ></i> Uji Data</button>
        <h3 class="card-title">Precision dan Recall<i class="fas fa-rocketchat"></i></h3>
    </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="mb-3">
                <tr>
                    <td width="120">Centroid</td>
                    <td width=180px><input type="number" placeholder="Centroid 1" id="c1" class="form-control form-control-sm"></td>
                    <td width=180px><input type="number" placeholder="Centroid 2" id="c2" class="form-control form-control-sm"></td>
                </tr>
            </table>
            <table class="table table-sm table-bordered text-center">
                <tr>
                    <td colspan='2' rowspan='2' class="align-middle font-weight-bold">Data</td>
                    <td colspan='2' class="font-weight-bold">Aktual</td>
                </tr>
                <tr>
                    <td>Kelas Positif</td>
                    <td>Kelas Negatif</td>
                </tr>
                <tr>
                    <td rowspan='2' class="align-middle font-weight-bold">Hasil Prediksi</td>
                    <td>Kelas Positif</td>
                    <td id="tp">True Positive (TP)</td>
                    <td id="fp">False Positive (FP)</td>
                </tr>
                <tr>
                    <td>Kelas Negatif</td>
                    <td id="fn">False Negative (FN)</td>
                    <td id="tn">True Negative (TN)</td>
                </tr>
                <tr>
                    <td colspan='2' rowspan="2" class="font-weight-bold align-middle">Total</td>
                    <td class="font-weight-bold" id="jml_positif">P</td>
                    <td class="font-weight-bold" id="jml_negatif">N</td>
                </tr>
                <tr>
                    <td colspan='2' class="align-middle font-weight-bold" id="jml_data"><p>Seluruh Data</p></td>
                </tr>
            </table>

            <table class="mt-3" class="table">
                <tr>
                    <td><b>Nilai Precision (TP/FP+TP)*100% </b></td>
                    <td><b>= <p style="display: inline;" id="n_precision"></p></b></td>
                </tr>
                <tr>
                    <td><b>Nilai Recall (TP/FN+TP)*100% </b></td>
                    <td><b>= <p style="display: inline;" id="n_recall"></p></b></td>
                </tr>
            </table>
        
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
  </div>
</div>
<!-- konten utama Dashboard -->


