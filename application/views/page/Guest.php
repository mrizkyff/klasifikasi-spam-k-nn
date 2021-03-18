<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">K-Means Clustering</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('login')?>">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('dataset')?>">Administrator</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
  </div>
</nav>
<!-- !navbar -->

<!-- kontennya -->
<!-- judul halaman -->
<!-- <div class="content-wrapper"> -->


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-center">Test Pesan yang Kamu Terima disini</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- akhir judul halaman -->

<!-- konten utama Dashboard -->
    <div class="container">
        <form>
        <div class="form-group">
            <label for="query">Masukkan pesan SMS untuk diuji</label>
            <input type="text" class="form-control" id="query" placeholder="Pesan SMS">
            <small id="pesan_kategori" class="form-text text-muted">Kategori pesan akan muncul di sini</small>
            <div class="valid-feedback">
                <p>Pesan tersebut termasuk cluster <b id="pesan_valid"></b></p>
            </div>
            <div class="invalid-feedback">
                <p>Pesan tersebut termasuk cluster <b id="pesan_invalid"></b></p>
            </div>
        </div>
        <div class="form-group">
            <button id="btn_cluster" class="btn btn-primary">Cari Cluster</button>
        </div>
        </form>
    </div>
<!-- konten utama Dashboard -->
<!-- !kontennya -->