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
  <a href="<?php echo base_url('admin/artikel/tambah') ?>" title="Tambah Artikel Baru" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>

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

        <?php 
        // Link delete
        include('delete.php');
        ?>
      </td>
    </tr>
    <?php $i++; } ?>

</tbody>
</table>