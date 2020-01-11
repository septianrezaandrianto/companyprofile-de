<?php 

// Error warning
echo validation_errors('<div class="alert alert-danger">','</div>');

// attribute
$attribute = 'class="form-horizontal"';

// form open
echo form_open(base_url('admin/kategori/edit/'.$kategori->id_kategori), $attribute);
?>
<div class="form-group row">
  <label class="col-sm-4 col-form-label">Nama kategori</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" value="<?php echo $kategori->nama_kategori ?>" required>
    </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label">Urutan kategori</label>
    <div class="col-sm-8">
    <input type="number" class="form-control" name="urutan_kategori" placeholder="Urutan kategori" value="<?php echo $kategori->urutan_kategori ?>">
    </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
    <button type="reset" name="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
    </div>
</div>

<?php 
// form close
echo form_close();
?>