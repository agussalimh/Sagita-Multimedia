<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Data Bank <?php echo $get['name_bank'] ?></h4>
            </div>
            <?php echo form_open_multipart('update_bank.aspx/'.$get['id_bank'],'class="form-horizontal"'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Bank</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder="Masukkan Bank" value="<?php echo $get['name_bank'] ?>" autocomplete="off" maxlength="100" class="form-control" name="bank">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Logo</label>
                        <div class="col-sm-8">
                            <img src="<?php echo base_url('assets/images/bank/'.$get['logo_bank']) ?>" width="50px" height="20px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Logo (Opsional)</label>
                        <div class="col-sm-8">
                            <input type="file"  autocomplete="off" accept="image/jpeg,image/png" class="form-control" name="logo">
                        </div>
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