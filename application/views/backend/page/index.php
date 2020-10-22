<div class="row">
    <div class="col-sm-12">
        <?php alert() ?>
        <section class="panel">
            <header class="panel-heading custom-tab tab-right ">
                <ul class="nav nav-tabs pull-left">
                    <li class="<?php if($tabActive=='1'){echo 'active';} ?>">
                        <a href="#home-3" data-toggle="tab">
                         Cara Pembelian
                        </a>
                    </li>
                    <li class="<?php if($tabActive=='2'){echo 'active';} ?>">
                        <a href="#about-3" data-toggle="tab">
                        Tentang Kami
                        </a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane <?php if($tabActive=='1'){echo 'active';} ?>" id="home-3">
                        <div class="row">
                            <div class="form">
                                <form action="<?php echo site_url('update_buy.aspx') ?>" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea class="form-control ckeditor" name="how" rows="6"><?php echo $get['how_to_buy'] ?></textarea>
                                        </div>
                                    </div>
                                    <center><button class="btn btn-primary"> Perbarui Halaman Cara Pembelian</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane <?php if($tabActive=='2'){echo 'active';} ?>" id="about-3">
                        <div class="row">
                            <div class="form">
                                <form action="<?php echo site_url('update_about.aspx') ?>" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea class="form-control ckeditor" name="about" rows="6"><?php echo $get['about_us'] ?></textarea>
                                        </div>
                                    </div>
                                    <center><button class="btn btn-primary"> Perbarui Halaman Tentang Kami</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    var baseurl='<?php echo base_url('assets') ?>';
</script>
<script src="<?php echo base_url()?>assets/backend/js/ckeditor/ckeditor.js"></script>