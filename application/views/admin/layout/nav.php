<?php 
// Ambil data admin berdasarkan data loginnya
$id_admin     = $this->session->userdata('id_admin');

$admin_aktif  = $this->admin_model->detail($id_admin);

//Konfigurasi website 
$site = $this->konfigurasi_model->listing();
?> 


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dashboard') ?>" class="brand-link">
      <img src="<?php echo base_url('assets/upload/images/asli/'.$site->icon) ?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dominic English</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

          <a href="<?php echo base_url('admin/profile') ?>" class="d-block"><?php echo $admin_aktif->nama_admin ?><br>
            Status : <?php echo $admin_aktif->akses_level ?>
          </a>
          <p style="color: white; font-size: 11px;">Member updated : <?php echo date('d M Y',strtotime($admin_aktif->tanggal)) ?></p>
            <a href="<?php echo base_url('login/logout') ?>" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
            
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <!-- Menu Dashboard -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas"></i>
              </p>
            </a>
          </li>

          <!-- Menu Artikel -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Artikel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/artikel') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Artikel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/artikel/tambah') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Artikel</p>
                </a>
              </li>
              <!-- kategori artikel -->
              <li class="nav-item">
                <a href="<?php echo base_url('admin/kategori') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Artikel</p>
                </a>
              </li>
            </ul>
          </li>  

          <!-- Menu Layanan -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Layanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/layanan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/layanan/tambah') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Layanan</p>
                </a>
              </li>
            </ul>
          </li> 

          <!-- Menu Galeri -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Galeri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/galeri') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/galeri/tambah') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Galeri</p>
                </a>
              </li>
            </ul>
          </li> 

          <!-- Menu Administrator -->
          <?php if($this->session->userdata('akses_level') == 'Admin') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
               User Administrator
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/admin') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/admin/tambah') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?> 

           <!-- Menu Konfigurasi -->
           <?php if($this->session->userdata('akses_level') == 'Admin') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
               Konfigurasi Website
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konfigurasi Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konfigurasi Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konfigurasi Icon</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>     

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>" style="color:gray;"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
          