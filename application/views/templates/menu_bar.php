
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://www.w3schools.com/howto/img_avatar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">K-Means Clustering</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="<?php echo base_url()?>asset/img/udinus.png" class="img-circle elevation-2" alt="User Image"> -->
          <h2>
            <i class="fa fa-user-circle text-light" aria-hidden="true"></i>
          </h2>
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('dataset')?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Database
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('klastering')?>" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Simulasi K-Means
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Halaman Depan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('precision')?>" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Precision & Recall
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Log-Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>