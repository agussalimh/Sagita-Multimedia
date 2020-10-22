<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Data User <?php echo $get['name_user'] ?></h4>
            </div>
            <?php echo form_open('update_user.aspx/'.$get['id_user'],'class="form-horizontal"'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo $get['name_user'] ?>" required placeholder="Masukkan Nama" autocomplete="off" maxlength="100" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Username</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo $get['username_user'] ?>" required placeholder="Masukkan Username" autocomplete="off" maxlength="30" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Password Baru (Opsional)</label>
                        <div class="col-sm-8">
                            <input type="password" placeholder="Masukkan Password Baru" autocomplete="off" class="form-control" name="password_update">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Level</label>
                        <div class="col-sm-8">
                            <select name="level" required class="form-control">
                                <option value="">Pilih Level</option>
                                <option value="1" <?php selected(1,$get['access_user']) ?>>Superadmin</option>
                                <option value="2" <?php selected(2,$get['access_user']) ?>>Admin</option>
                                <option value="2" <?php selected(2,$get['access_user']) ?>>User</option>
                            </select>
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
</script>