<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="mod_user" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Profil</h4>
            </div>
            <?php echo form_open('update_account.aspx','class="form-horizontal"'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo getuser('name_user') ?>" required autocomplete="off" placeholder="Masukkan Nama" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Username</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo getuser('username_user') ?>" required autocomplete="off" placeholder="Masukkan Username" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Password</label>
                        <div class="col-sm-8">
                            <input type="password" value="<?php echo "*****" ?>" required autocomplete="off" placeholder="Masukkan Password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    $("#mod_user").modal("show");
</script>