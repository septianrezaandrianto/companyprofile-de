<?php 
// Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<p>
  <a href="<?php echo base_url('admin/admin/tambah') ?>" title="Tambah Admin Baru" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Username - Level</th>
      <th>Password</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i=1; foreach($admin as $admin) { ?>
    <tr>
      <td width="5%"><?php echo $i ?></td>
      <td><?php echo $admin->nama_admin ?></td>
      <td><?php echo $admin->email_admin ?></td>
      <td><?php echo $admin->username_admin ?> - <?php echo $admin->akses_level ?></td>
      <td><?php echo $admin->password_admin ?></td>
      <td>
        <a href="<?php echo base_url('admin/admin/edit/'.$admin->id_admin) ?>" title="Edit Admin" class="btn btn-warning btn-xs">
          <i class="fa fa-edit"></i> Edit
        </a>

        <?php 
        // Link delete
        include('delete.php');
        ?>
      </td>
    </tr>
    <?php $i++; } ?>

</tbody>
</table>