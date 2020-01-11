<?php 
// Error warning
echo validation_errors('<div class="alert alert-danger">','</div>');

// Attribute
// $attribute = 'class="alert alert-success"'; 

// Form open
echo form_open(base_url('admin/admin/tambah'));
// echo form_open(base_url('admin/admin/tambah'),$attribute);
?>
<div class="row">
<div class="col-md-6">
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" name="nama_admin" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_admin') ?>" required>
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email_admin" class="form-control" placeholder="Email" value="<?php echo set_value('email_admin') ?>" required>
	</div>

	<div class="form-group">
		<label>Level Hak Akses</label>
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="User">User</option>
		</select>
	</div>	
</div>


<div class="col-md-6">
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username_admin" class="form-control" placeholder="Username" value="<?php echo set_value('username_admin') ?>" required>
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password_admin" class="form-control" placeholder="Password" value="<?php echo set_value('password_admin') ?>" required>
	</div>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" name="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
	</div>
</div>
</div>

<?php 
// Form close
echo form_close();
?>