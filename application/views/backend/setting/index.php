<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo site_url('edit_setting.aspx') ?>" class="btn btn-warning">
                    <i class="fa fa-shopping-cart"></i> Setting Data Toko
                </a>
                <a href="<?php echo site_url('edit_setting_tambahan.aspx') ?>" class="btn btn-info">
                    <i class="fa fa-shopping-cart"></i> Setting Tambahan
                </a>
            </div>
        </div>
        <br>
        <?php alert() ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Setting Toko</div>
            </div>
            <div class="panel-body">
                <center>
                    <img src="<?php echo base_url('uploads/'.$get['logo_shop']) ?>" width="200px" height="200px">
                </center>
                <div class="adv-table">
                    <table class="table table-responsive">
                        <tr>
                            <th width="200px">Nama Pendek Toko</th>
                            <td width="300px"><?php echo $get['shortname_shop'] ?></td>
                            <th width="200px">PIN BBM</th>
                            <td width="300px"><?php echo $get['bbm_contact'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Panjang Toko</th>
                            <td><?php echo $get['longname_shop'] ?></td>
                            <th>Nomor WA</th>
                            <td><?php echo $get['wa_contact'] ?></td>
                        </tr>
                        <tr>
                            <th>Motto/Slogan Toko</th>
                            <td><?php echo $get['motto_shop'] ?></td>
                            <th>Nomor Telepon</th>
                            <td><?php echo $get['phone_contact'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Toko</th>
                            <td><?php echo $get['location_shop'] ?></td>
                            <th>Email Toko</th>
                            <td><?php echo $get['email_shop'] ?></td>
                        </tr>
                        <tr>
                            <?php $prop['propinsi']=$get['propinsi_shop'] ?>
                            <?php $prop['kabupaten']=$get['kabupaten_shop'] ?>
                            <tr>
                                <th>Provinsi</th>
                                <td>
                                    <?php $this->load->view('frontend/page/rajaongkir/NameProvince.php',$prop); ?>
                                </td>
                                <th>Kabupaten</th>
                                <td>
                                    <?php $this->load->view('frontend/page/rajaongkir/NameCity.php',$prop); ?>
                                </td>
                            </tr>
                        </tr>
                        <tr>
                            <th>Nama Pemilik</th>
                            <td><?php echo $get['name_manage'] ?></td>
                            <th>Jasa Pengiriman</th>
                            <td>
                                <?php $val=array(); ?>
                                <?php if($get['pos']==1){ $val[]="POS";} ?>
                                <?php if($get['jne']==1){ $val[]="JNE";} ?>
                                <?php if($get['tiki']==1){ $val[]="TIKI";} ?>
                                <?php echo implode(", ", $val) ?>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">Sosial Media</th>
                            <td colspan="2">
                                <?php if($get['facebook']!="" && !is_null($get['facebook'])){
                                echo "<i class='fa fa-facebook-square'></i> ".
                                $get['facebook'].'<br><br>';
                                } ?>
                                <?php if($get['twitter']!="" && !is_null($get['twitter'])){
                                echo "<i class='fa fa-twitter-square'></i> ".
                                $get['twitter'].'<br><br>';
                                } ?>
                                <?php if($get['google']!="" && !is_null($get['google'])){
                                echo "<i class='fa fa-google-plus-square'></i> ".
                                $get['google'].'<br><br>';
                                } ?>
                                <?php if($get['instagram']!="" && !is_null($get['instagram'])){
                                echo "<i class='fa fa-instagram'></i> ".
                                $get['instagram'].'<br><br>';
                                } ?>
                                <?php if($get['youtube']!="" && !is_null($get['youtube'])){
                                echo "<i class='fa fa-youtube-square'></i> ".
                                $get['youtube'].'<br><br>';
                                } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>