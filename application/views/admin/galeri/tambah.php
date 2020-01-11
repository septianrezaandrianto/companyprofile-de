<?php 
// Error warning
echo validation_errors('<div class="alert alert-danger">','</div>');
// Error upload
if(isset($error_upload)) {
	echo '<div class="alert alert-danger">'.$error_upload.'</div>';
}

// Attribute
// $attribute = 'class="alert alert-success"'; 

// Form open
echo form_open_multipart(base_url('admin/galeri/tambah'));
// echo form_open(base_url('galeri/galeri/tambah'),$attribute);
?>
<div class="row">
<div class="col-md-8">
	<div class="form-group">
		<label>Judul Galeri</label>
		<input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri" value="<?php echo set_value('judul_galeri') ?>" required>
	</div>	
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Posisi Galeri</label>
		<select name="posisi_galeri" class="form-control">
			<option value="Galeri">Galeri</option>
			<option value="Homepage">Homepage Slider</option>
		</select>
	</div>	
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Link/URL Website</label>
		<input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo set_value('website') ?>" required>
	</div>	
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar_galeri" class="form-control" required>
	</div>	
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Isi Galeri</label>
		<textarea name="isi_galeri" class="form-control tinymce" placeholder="Isi galeri"><?php echo set_value('isi_galeri') ?></textarea>
	</div>
</div>
	
<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
	<button type="reset" name="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
</div>

</div>
<div class="clearfix"></div>
<?php
// Form close
echo form_close();
?>