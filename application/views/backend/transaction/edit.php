<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Bukti Transfer Transaksi <?php echo $get['category'] ?></h4>
            </div>
            <?php echo form_open('update_category.aspx/'.$get['id_category']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Bank</label>
                        <div class="col-sm-8"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Bukti</label>
                        <div class="col-sm-8"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    $("#update").modal("show");
    $("form").submit(function(){
        $('button').attr('disabled','disabled');
    });
</script>