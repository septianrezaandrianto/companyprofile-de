<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $admin->id_admin ?>">
<i class="fas fa-trash-alt"></i> Delete
</button>

<div class="modal fade" id="Delete<?php echo $admin->id_admin ?>">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Menghapus data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus data ini?&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url('admin/admin/delete/'.$admin->id_admin) ?>" class="btn btn-outline-light"><i class="fas fa-trash-alt"></i> Ya, hapus data ini</a>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->