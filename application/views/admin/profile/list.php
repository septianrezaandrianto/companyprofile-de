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

// Attribute
// $attribute = 'class="alert alert-success"'; 

// Form open
echo form_open(base_url('admin/profile'));

?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" name="nama_admin" class="form-control" placeholder="Nama Lengkap" value="<?php echo $admin->nama_admin ?>" required>
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email_admin" class="form-control" placeholder="Email" value="<?php echo $admin->email_admin ?>" required>
	</div>

	<div class="form-group">
		<label>Level Hak Akses</label>
		<input type="text" name="akses_level" class="form-control" value="<?php echo $admin->akses_level ?>" readonly>
	</div>	
</div>


<div class="col-md-6">
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username_admin" class="form-control" placeholder="Username" value="<?php echo $admin->username_admin ?>" readonly>
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password_admin" class="form-control" placeholder="Password" value="<?php echo $admin->password_admin ?>" required>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>

<?php 
// Form close
echo form_close();
?>