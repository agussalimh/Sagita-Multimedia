<div class="modal signUpContent fade" id="modalBukti" style="margin-left: auto;">
    <div class="modal-dialog">
        <div class="modal-content">
          <?php echo form_open_multipart('uploadFix.aspx', 'class="form-horizontal"'); ?>
          <?php echo form_hidden('id', $get['kode_pembelian']); ?>
            <div class="modal-body">
                <div class="form-group">
                  <label class="col-sm-4">Bukti Transfer</label>
                  <div class="col-sm-8">
                      <input type="file" required  autocomplete="off" accept="image/jpeg,image/png" class="form-control" name="bukti">
                      <span style="color:red;">*)Masukkan foto/gambar bukti transferan</span>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">
                  <i class="glyphicon glyphicon-remove-sign"></i> Batal
                </button>
                <button id="lanjut" class="btn btn-primary" type="submit">
                  Simpan
                </button>
            </div>
          <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
  $("#modalBukti").modal("show");
  $("form").submit(function(){
      $('button').attr('disabled','disabled');
  });
</script>