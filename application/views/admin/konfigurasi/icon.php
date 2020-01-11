<?php 
// Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

// Error upload
if(isset($error))
{
  echo '<div class="alert alert-success">';
  echo $error;
  echo '</div>';
}

// Error warning
echo validation_errors('<div class="alert alert-danger">','</div>');
// Error upload
if(isset($error_upload)) {
	echo '<div class="alert alert-danger">'.$error_upload.'</div>';
}

// Attribute
// $attribute = 'class="alers alert-success"'; 

// Form open
echo form_open_multipart(base_url('admin/konfigurasi/icon'));
// echo form_open(base_url('galeri/galeri/tambah'),$attribute);
?>

<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
<input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('id_admin'); ?>">

<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label>Icon Lembaga</label>
			<input type="file" name="icon" class="form-control" required>
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		</div>

	</div>

	<div class="col-md-6">
		
		<?php if($konfigurasi->icon !="") {?>
		<img src="<?php echo base_url('assets/upload/images/asli/'.$konfigurasi->icon) ?>" alt="<?php echo $konfigurasi->namaweb ?>" class="img img-responsive img-thumbnail">
		<?php }else{ ?>
		<p class="alert alert-success text-center">Belum ada Icon</p>
		<?php } ?>
	</div>

</div>

<div class="clearfix"></div>
<?php
// Form close
echo form_close();
?>