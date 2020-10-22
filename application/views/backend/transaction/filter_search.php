<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/backend/js/date/bootstrap-datetimepicker.css" />
<form action="<?php echo site_url('filter_transaction.aspx') ?>" class="form-horizontal" method="post">
    <?php echo form_hidden('search', '1'); ?>
    <div class="form-group">
        <label class="col-sm-4">Nama Pelanggan</label>
        <div class="col-sm-8">
            <input type="text" value="<?php echo $this->session->userdata('nama'); ?>" placeholder="Masukkan Nama Pelanggan" autocomplete="off" class="form-control" name="nama">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Email</label>
        <div class="col-sm-8">
            <input type="text" value="<?php echo $this->session->userdata('email'); ?>" placeholder="Masukkan Email" autocomplete="off" class="form-control" name="email">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Nomor Telepon</label>
        <div class="col-sm-8">
            <input type="text" value="<?php echo $this->session->userdata('telepon'); ?>" placeholder="Masukkan Nomor Telepon" autocomplete="off" onkeypress="return nomer(this)" class="form-control" name="telepon">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Tanggal</label>
        <div class="col-sm-8">
            <div class="input-group">
                <input type="text" placeholder="Masukkan Tanggal" autocomplete="off" class="form-control default-date-picker" name="tanggal" value="<?php echo $this->session->userdata('tanggal'); ?>">
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="button" onclick="$('[name=tanggal]').val('')">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Status</label>
        <div class="col-sm-8">
            <select name="status" class="form-control">
                <option value="">- Pilih Status -</option>
                <option value="0" <?php selected('0',$this->session->userdata('status')) ?>>Pending</option>
                <option value="3" <?php selected('3',$this->session->userdata('status')) ?>>Sudah Transfer</option>
                <option value="1" <?php selected('1',$this->session->userdata('status')) ?>>Dikirim</option>
                <option value="2" <?php selected('2',$this->session->userdata('status')) ?>>Sampai</option>
            </select>
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
    </center>
</form>