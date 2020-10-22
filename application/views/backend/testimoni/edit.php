<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Data Testimoni <?php echo $get['name'] ?></h4>
            </div>
            <?php echo form_open_multipart('update_testimoni.aspx/'.$get['id_testimony'],'class="form-horizontal"'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder="Masukkan Nama" value="<?php echo $get['name'] ?>" autocomplete="off" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Email</label>
                        <div class="col-sm-8">
                            <input type="email" required placeholder="Masukkan Email" value="<?php echo $get['email'] ?>" autocomplete="off" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Testimoni</label>
                        <div class="col-sm-8">
                            <textarea name="testimony" required placeholder="Masukkan Testimoni" class="form-control" rows="10"><?php echo $get['testimony'] ?></textarea>
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