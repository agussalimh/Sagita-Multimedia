<style>
    #footer-head{
        font-size: 18px;
        font-weight: 700;
        line-height: 27px;
        text-transform: uppercase;
        color: #3a3a3a;
    }
</style>
<footer>
    <div class="footer" style="background-color: #fff; padding:20px; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span id="footer-head">
                    <?php 
                        echo gettoko('longname_shop')?
                        gettoko('longname_shop'):
                        gettoko('shortname_shop'); 
                    ?>
                    </span>
                    &nbsp;&nbsp;
                    <span>
                        <b>
                            &quot;<?php echo gettoko('motto_shop') ?>&quot;
                        </b>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 hidden-xs">
                    <h3>Info</h3>
                    <ul>
                        <li class="supportLi">
                            <p><?php echo gettoko('motto_shop') ?></p>
                            <h4>
                                <a class="inline" href="callto:+12025550151"> 
                                    <strong> 
                                    <i class="fa fa-phone"> </i> 
                                    <?php echo gettoko('phone_contact') ?> 
                                    </strong> 
                                </a>
                            </h4>
                            <h4>
                                <a class="inline" href="#"> 
                                    <i class="fa fa-envelope-o"> </i>
                                    <?php echo gettoko('email_shop') ?>
                                </a>
                            </h4>
                        </li>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-3">
                    <h3> Kontak </h3>
                    <ul>
                    <?php if(gettoko('bbm_contact')!=''): ?>
                        <li class="supportLi">
                            <img src="<?php echo base_url('uploads/bbm.png') ?>" width="20px"> 
                            <strong><?php echo gettoko('bbm_contact') ?></strong>
                        </li>
                    <?php endif ?>
                    <?php if(gettoko('wa_contact')!=''): ?>
                        <li class="supportLi">
                            <img src="<?php echo base_url('uploads/wa.png') ?>" width="20px"> 
                            <strong><?php echo gettoko('wa_contact') ?></strong>
                        </li>
                    <?php endif ?>
                    <?php if(gettoko('phone_contact')!=''): ?>
                        <li class="supportLi">
                            <img src="<?php echo base_url('uploads/phone.png') ?>" width="18px"> 
                            <strong><?php echo gettoko('phone_contact') ?></strong>
                        </li>
                    <?php endif ?>
                    </ul>
                </div>
                <div class="col-lg-3 hidden-xs">
                    <h3>Halaman</h3>
                    <ul>
                        <li class="supportLi">
                            <a href="<?php echo site_url('howtobuy.aspx') ?>"> Cara Pembelian</a>
                        </li>
                        <li class="supportLi">
                            <a href="<?php echo site_url('ongkir.aspx') ?>"> Cek Ongkir</a>
                        </li>
                        <li class="supportLi">
                            <a href="<?php echo site_url('pricelist.aspx') ?>"> Daftar Harga</a>
                        </li>
                        <li class="supportLi">
                            <a href="<?php echo site_url('aboutus.aspx') ?>"> Tentang Kami</a>
                        </li>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-3">
                    <h3>Rekening Bank</h3>
                    <ul>
                    <?php $no=0; foreach($bank as $row): $no++ ?>
                        <li class="supportLi">
                            <img src="<?php echo base_url('assets/images/bank/'.$row->logo_bank) ?>" width="50px" alt="">
                            &nbsp;&nbsp; <?php echo $row->number ?> <br> [<?php echo $row->name ?>]
                        </li>
                    <?php endforeach;?>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <span onmouseover="tampil()">
                &copy; <?php echo date('Y') ?> <?php echo gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop') ?> 
            </span> 
            <span style="float: right;width: 250px;line-height: 30px;">
                <?php echo getBank() ?>
            </span>
            <span style="display:none;"  id="log_admin">
                <a href="<?php echo site_url('auth.aspx') ?>" target="_blank">.</a> 
            </span>
        </div>
    </div>
    <script>
        function tampil(){
            document.getElementById("log_admin").style.display='block';
        }
        function hilang(){
            document.getElementById("log_admin").style.display='none';
        }
    </script>
</footer>