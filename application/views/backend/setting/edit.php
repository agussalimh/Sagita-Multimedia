<div class="row">
    <div class="col-sm-12">
        <?php alert() ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Setting Toko</div>
            </div>
            <?php echo form_open_multipart('update_setting.aspx','class="form-horizontal"'); ?>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4">Nama Pendek Toko</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $get['shortname_shop'] ?>" required placeholder="Masukkan Nama Pendek Toko" autocomplete="off" maxlength="20" class="form-control" name="shortname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Nama Panjang Toko</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $get['longname_shop'] ?>" placeholder="Masukkan Nama Panjang Toko" autocomplete="off" maxlength="100" class="form-control" name="longname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Motto/Slogan Toko</label>
                            <div class="col-sm-8">
                                <input type="text" required value="<?php echo $get['motto_shop'] ?>" placeholder="Masukkan Motto/Slogan Toko" autocomplete="off" maxlength="100" class="form-control" name="motto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Alamat Toko</label>
                            <div class="col-sm-8">
                                <input type="text" required placeholder="Masukkan Alamat Toko" value="<?php echo $get['location_shop'] ?>" autocomplete="off" maxlength="120" class="form-control" name="location">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Nama Pemilik</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $get['name_manage'] ?>" required placeholder="Masukkan Nama Pemilik Toko" autocomplete="off" maxlength="100" class="form-control" name="manager">
                            </div>
                        </div>
                        <?php $prop['propinsi']=$get['propinsi_shop']; ?>
                        <div class="form-group">
                            <label class="col-sm-4">Propinsi</label>
                            <div class="col-sm-8">
                                <select class="form-control" required name="propinsi" id="propinsi_asal">
                                    <option value="" selected="" disabled="">Pilih Provinsi</option>
                                    <?php $this->load->view('frontend/page/rajaongkir/Province.php',$prop); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Kabupaten</label>
                            <div class="col-sm-8">
                                <select class="form-control" required name="kabupaten" id="origin">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Logo Toko</label>
                            <div class="col-sm-8">
                                <img src="<?php echo base_url('uploads/'.$get['logo_shop']) ?>" width="100px" height="100px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Logo Toko(Baru)</label>
                            <div class="col-sm-8">
                                <input type="file" accept="image/jpeg,image/png" class="form-control" name="logo">
                                <i>*) Ukuran optimal 500 x 500 pixel</i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4">PIN BBM</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Masukkan PIN BBM" value="<?php echo $get['bbm_contact'] ?>" autocomplete="off" maxlength="20" class="form-control" name="bbm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Nomor Whatsapp</label>
                            <div class="col-sm-8">
                                <input type="text" onkeypress="return nomer(this);" placeholder="Masukkan Nomor Whatsapp" value="<?php echo $get['wa_contact'] ?>" autocomplete="off" maxlength="20" class="form-control" name="wa">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4">Nomor Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $get['phone_contact'] ?>" onkeypress="return nomer(this);" placeholder="Masukkan Nomor Telepon" autocomplete="off" maxlength="20" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Email Toko</label>
                            <div class="col-sm-8">
                                <input type="email" value="<?php echo $get['email_shop'] ?>" required placeholder="Masukkan Email Toko" autocomplete="off" maxlength="30" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Jasa Pengiriman</label>
                            <div class="col-sm-8">
                                <input type="checkbox" value="1" 
                                <?php 
                                if($get['pos']==1)
                                { 
                                    echo "checked";
                                } 
                                ?> 
                                name="pos"> POS &nbsp;&nbsp;
                                <input type="checkbox" value="1"
                                <?php 
                                if($get['jne']==1)
                                { 
                                    echo "checked";
                                } 
                                ?>
                                name="jne"> JNE &nbsp;&nbsp;
                                <input type="checkbox" value="1"
                                <?php
                                if($get['tiki']==1)
                                { 
                                    echo "checked";
                                } 
                                ?>
                                name="tiki"> TIKI
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Facebook (Opsional)</label>
                            <div class="col-sm-8">
                                <input type="url" value="<?php echo $get['facebook'] ?>" placeholder="Masukkan Alamat Profil Facebook" autocomplete="off" class="form-control" name="facebook">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Twitter (Opsional)</label>
                            <div class="col-sm-8">
                                <input type="url" value="<?php echo $get['twitter'] ?>" placeholder="Masukkan Alamat Profil Twitter" autocomplete="off" class="form-control" name="twitter">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Google Plus (Opsional)</label>
                            <div class="col-sm-8">
                                <input type="url" value="<?php echo $get['google'] ?>" placeholder="Masukkan Alamat Profil Akun Google" autocomplete="off" class="form-control" name="google">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Instagram (Opsional)</label>
                            <div class="col-sm-8">
                                <input type="url" value="<?php echo $get['instagram'] ?>" placeholder="Masukkan Alamat Profil Instagram" autocomplete="off" class="form-control" name="instagram">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Youtube (Opsional)</label>
                            <div class="col-sm-8">
                                <input type="url" value="<?php echo $get['youtube'] ?>" placeholder="Masukkan Alamat Profil Youtube" autocomplete="off" class="form-control" name="youtube">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <center>
                        <button type="submit" class="btn btn-primary">Perbarui Data Toko</button>
                    </center>
                </div>
            <?php echo form_close(); ?>   
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var kabupaten='<?php echo $get['kabupaten_shop'] ?>';
        var propinsi=$('#propinsi_asal').val();
        $.ajax({
            url:"<?php echo site_url('getcityfirst.aspx')?>",
            type:"POST",
            cache:false,
            data:{"propinsi":propinsi,"kabupaten":kabupaten},
            success:function(data){
                 $('#origin').html(data);
            }
        });
        $("#propinsi_asal").change(function(){
         var propinsi=$('#propinsi_asal').val();
            $.ajax({
                url:"<?php echo site_url('getcity.aspx')?>",
                type:"POST",
                cache:false,
                data:"propinsi="+propinsi,
                success:function(data){
                     $('#origin').html(data);
                }
            });
                
        });
    });
    $("#cod").click(function(){
        if(!$("#cod").is(':checked'))
            $('#free').attr('checked',false);
        else
            $('#free').attr('checked',true);
        
    });
</script>