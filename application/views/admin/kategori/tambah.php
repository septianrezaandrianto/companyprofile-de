<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Tambah">
<i class="fas fa-plus"></i> Tambah Baru
</button>

<div class="modal fade" id="Tambah">
    <div class="modal-dialog">
      <div class="modal-content bg-default">
        <div class="modal-header">
          <h4 class="modal-title">Tambah data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php 
          // attribute
          $attribute = 'class="form-horizontal"';

          // form open
          echo form_open(base_url('admin/kategori'), $attribute);
          ?>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama kategori</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Urutan kategori</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="urutan_kategori" placeholder="Urutan kategori">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>

           <?php 
           // form close
           echo form_close();
          ?>
        </div>
        <div class="modal-footer text-right">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->