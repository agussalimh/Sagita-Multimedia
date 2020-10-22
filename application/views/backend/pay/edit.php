<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Data Pembayaran</h4>
            </div>
            <?php echo form_open('update_pay.aspx/'.$get['id_payment'],'class="form-horizontal"'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Bank</label>
                        <div class="col-sm-8">
                            <select name="bank" required class="form-control">
                                <option value="">Pilih Bank</option>
                                <?php foreach ($bank as $value => $row): ?>
                                    <option value="<?php echo $row->id_bank?>" <?php selected($row->id_bank,$get['id_bank']) ?>><?php echo $row->name_bank ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Nomor Rekening</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo $get['number'] ?>" maxlength="50" required placeholder="Masukkan Nomor Rekening" autocomplete="off" class="form-control" name="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Atas Nama</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder="Masukkan Atas Nama Rekening" value="<?php echo $get['name'] ?>" maxlength="100" autocomplete="off" class="form-control" name="name">
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