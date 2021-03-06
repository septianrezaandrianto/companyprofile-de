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
echo form_open_multipart(base_url('admin/artikel/edit/'.$artikel->id_artikel));
// echo form_open(base_url('artikel/artikel/tambah'),$attribute);
?>
<div class="row">
<div class="col-md-8">
	<div class="form-group">
		<label>Judul Artikel</label>
		<input type="text" name="judul_artikel" class="form-control" placeholder="Judul artikel" value="<?php echo $artikel->judul_artikel ?>" required>
	</div>	
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status Artikel</label>
		<select name="status_artikel" class="form-control">
			<option value="Publish" <?php if($artikel->status_artikel=="Publish") {echo "selected"; } ?>>Publish</option>
			<option value="Draft" <?php if($artikel->status_artikel=="Draft") {echo "selected"; } ?>>Draft</option>
		</select>
	</div>	
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Jenis Artikel</label>
		<select name="jenis_artikel" class="form-control">
			<option value="Artikel" <?php if($artikel->jenis_artikel=="Artikel") {echo "selected"; } ?>>Artikel</option>
			<option value="Profile" <?php if($artikel->jenis_artikel=="Profile") {echo "selected"; } ?>>Profile</option>
		</select>
	</div>	
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Kategori Artikel</label>
		<select name="id_kategori" class="form-control">
			<?php foreach($kategori as $kategori) { ?>
			<option value="<?php echo $kategori->id_kategori ?>" <?php if($artikel->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>>
				<?php echo $kategori->nama_kategori ?>
			</option>
			<?php } ?>
		</select>
	</div>	
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar_artikel" class="form-control">
	</div>	
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Isi Artikel</label>
		<textarea name="isi_artikel" class="form-control tinymce" placeholder="Isi artikel"><?php echo $artikel->isi_artikel ?></textarea>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Keywords Artikel (Untuk SEO / memudahkan pencarian artikel di Google)</label>
		<textarea name="keywords" class="form-control" placeholder="keywords Artikel"><?php echo $artikel->keywords ?></textarea>
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