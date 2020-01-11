<?php 
// Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>
   
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><a href="<?php echo base_url('admin/artikel') ?>"><i class="fas fa-newspaper"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Artikel</span>
              <span class="info-box-number">
                <?php echo count($artikel) ?>
              <!-- <small>Artikel</small> -->
              </span></a>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><a href="<?php echo base_url('admin/layanan') ?>"><i class="fas fa-dollar-sign"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Layanan</span>
              <span class="info-box-number">
                <?php echo count($layanan) ?>
              <!-- <small>Layanan</small> -->
              </span></a>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><a href="<?php echo base_url('admin/galeri') ?>"><i class="fas fa-images"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Galeri</span>
                  <span class="info-box-number">
                    <?php echo count($galeri) ?>
                  </span></a>
              </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->

      <?php if($this->session->userdata('akses_level') == 'Admin') { ?>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><a href="<?php echo base_url('admin/admin') ?>"><i class="fas fa-user-lock"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">User Administrator</span>
                <span class="info-box-number">
                  <?php echo count($admin) ?>
                </span></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
    <?php } ?>

    </div><!-- /.row -->

  </div>
</section>
  
  <hr>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>Gambar</th>
      <th>Judul</th>
      <th>Kategori</th>
      <th>Jenis - Status</th>
      <th>Penulis</th>
      <th>Tanggal</th>
      <th width="15%">Action</th>
    </tr>
  </thead>
  
  <tbody>
    <?php $i=1; foreach($artikel as $artikel) { ?>
    <tr>
      <td width="5%"><?php echo $i ?></td>
      <td>
        <img src="<?php echo base_url('assets/upload/images/thumbs/'.$artikel->gambar_artikel)?>" width="60" class="img img-thumbnail">
      </td>
      <td><?php echo $artikel->judul_artikel ?></td>
      <td><?php echo $artikel->nama_kategori ?></td>
      <td><?php echo $artikel->jenis_artikel ?> - <?php echo $artikel->status_artikel ?></td>
      <td><?php echo $artikel->nama_admin ?></td>
      <td><?php echo $artikel->tanggal_post ?></td>
      <td>
        <a href="<?php echo base_url('admin/artikel/edit/'.$artikel->id_artikel) ?>" title="Edit Artikel" class="btn btn-warning btn-xs">
          <i class="fa fa-edit"></i> Edit
        </a>

      </td>
    </tr>
    <?php $i++; } ?>

  </tbody>
</table>