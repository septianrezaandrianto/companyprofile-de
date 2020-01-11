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
echo form_open_multipart(base_url('admin/layanan/edit/'.$layanan->id_layanan));
// echo form_open(base_url('layanan/layanan/tambah'),$attribute);
?>
<div class="row">
<div class="col-md-8">
	<div class="form-group">
		<label>Judul Layanan</label>
		<input type="text" name="judul_layanan" class="form-control" placeholder="Judul layanan" value="<?php echo $layanan->judul_layanan ?>" required>
	</div>	
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status Layanan</label>
		<select name="status_layanan" class="form-control">
			<option value="Publish" <?php if($layanan->status_layanan=="Publish") {echo "selected"; } ?>>Publish</option>
			<option value="Draft" <?php if($layanan->status_layanan=="Draft") {echo "selected"; } ?>>Draft</option>
		</select>
	</div>	
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Harga Layanan</label>
		<input type="number" name="harga_layanan" class="form-control" placeholder="Harga Layanan" value="<?php echo $layanan->harga_layanan ?>" required>
	</div>	
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar_layanan" class="form-control">
	</div>	
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Isi Layanan</label>
		<textarea name="isi_layanan" class="form-control tinymce" placeholder="Isi layanan"><?php echo $layanan->isi_layanan ?></textarea>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Keywords Layanan (Untuk SEO / memudahkan pencarian layanan di Google)</label>
		<textarea name="keywords" class="form-control" placeholder="keywords Layanan"><?php echo $layanan->keywords ?></textarea>
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