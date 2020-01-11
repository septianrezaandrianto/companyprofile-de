<?php 
// Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

// Error warning
echo validation_errors('<div class="alert alert-danger">','</div>');
// Error upload
if(isset($error_upload)) {
	echo '<div class="alert alert-danger">'.$error_upload.'</div>';
}

// Attribute
// $attribute = 'class="alert alert-success"'; 

// Form open
echo form_open_multipart(base_url('admin/konfigurasi'));
// echo form_open(base_url('galeri/galeri/tambah'),$attribute);
?>

<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
<input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('id_admin'); ?>">

<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label>Nama Lembaga</label>
			<input type="text" name="namaweb" class="form-control" placeholder="Nama Lembaga" value="<?php echo $konfigurasi->namaweb ?>">
		</div>

		<div class="form-group">
			<label>Tagline lembaga</label>
			<input type="text" name="tagline" class="form-control" placeholder="Tagline lembaga" value="<?php echo $konfigurasi->tagline ?>">
		</div>

		<div class="form-group">
			<label>Website lembaga</label>
			<input type="url" name="website" class="form-control" placeholder="Website lembaga" value="<?php echo $konfigurasi->website ?>">
		</div>

		<div class="form-group">
			<label>Email lembaga</label>
			<input type="email" name="email" class="form-control" placeholder="Email lembaga" value="<?php echo $konfigurasi->email ?>">
		</div>

		<div class="form-group">
			<label>No.Telepon lembaga</label>
			<input type="text" name="no_telepon" class="form-control" placeholder="No.Telepon lembaga" value="<?php echo $konfigurasi->no_telepon ?>">
		</div>

		<div class="form-group">
			<label>Facebook URL</label>
			<input type="url" name="facebook" class="form-control" placeholder="Facebook URL" value="<?php echo $konfigurasi->facebook ?>">
		</div>

		<div class="form-group">
			<label>Instagram URL</label>
			<input type="url" name="instagram" class="form-control" placeholder="Instagram URL" value="<?php echo $konfigurasi->instagram ?>">
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			<button type="reset" name="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
		</div>
	</div>

	<div class="col-md-6">

		<div class="form-group">
			<label>Alamat Lembaga</label>
			<textarea name="alamat" class="form-control" placeholder="Alamat lembaga"><?php echo $konfigurasi->alamat ?></textarea>
		</div>

		<div class="form-group">
			<label>Deskripsi Lembaga</label>
			<textarea name="deskripsi" class="form-control" placeholder="Deskripsi lembaga"><?php echo $konfigurasi->deskripsi ?></textarea>
		</div>

		<div class="form-group">
			<label>Keywords</label>
			<textarea name="keywords" class="form-control" placeholder="Keywords"><?php echo $konfigurasi->keywords ?></textarea>
		</div>

		<div class="form-group">
			<label>Metatext (<i>from Google Analytics</i>)</label>
			<textarea name="metatext" class="form-control" placeholder="Metatext"><?php echo $konfigurasi->metatext ?></textarea>
		</div>

		<div class="form-group">
			<label>Google maps</label>
			<textarea name="maps" class="form-control" placeholder="Google maps"><?php echo $konfigurasi->maps ?></textarea>
		</div>
	</div>

</div>

<div class="clearfix"></div>
<?php
// Form close
echo form_close();
?>