<div class="row">
    <div class="col-sm-12">
        <?php alert() ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Dashboard</div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row state-overview">
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="panel purple">
                                    <div class="symbol">
                                        <i class="fa fa-archive"></i>
                                    </div>
                                    <div class="state-value">
                                        <div class="value"><?php echo $product ?></div>
                                        <div class="title">Jumlah Produk Aktif</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="panel red">
                                    <div class="symbol">
                                        <i class="fa fa-th-list"></i>
                                    </div>
                                    <div class="state-value">
                                        <div class="value"><?php echo $category ?></div>
                                        <div class="title">Jumlah Kategori Produk Aktif</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row state-overview">
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="panel blue">
                                    <div class="symbol">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="state-value">
                                        <div class="value"><?php echo $transaction ?></div>
                                        <div class="title"> Jumlah Pemesanan Hari Ini</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="panel green">
                                    <div class="symbol">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="state-value">
                                        <div class="value"><?php echo $user ?></div>
                                        <div class="title"> Jumlah User Toko Aktif</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <center><h3>Grafik Pembelian</h3></center>
                        <div id="graph-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/morris-chart/morris.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/morris-chart/raphael-min.js"></script>
<script>
    Morris.Bar({
        element: 'graph-bar',
        data: [
            <?php 
                $x  = mktime(0, 0, 0, date("m"), date("d")-6,date("Y"));
                $x1  = mktime(0, 0, 0, date("m"), date("d")-5,date("Y"));
                $x2  = mktime(0, 0, 0, date("m"), date("d")-4,date("Y"));
                $x3  = mktime(0, 0, 0, date("m"), date("d")-3,date("Y"));
                $x4  = mktime(0, 0, 0, date("m"), date("d")-2,date("Y"));
                $x5  = mktime(0, 0, 0, date("m"), date("d")-1,date("Y"));
                $x6  = mktime(0, 0, 0, date("m"), date("d"),date("Y"));
            ?>
            {x: '<?php echo date('Y-m-d',$x); ?>', y: <?php echo $this->M__app->getdaytrans(date('Y-m-d',$x))->num_rows();?>},
            {x: '<?php echo date('Y-m-d',$x1) ?>', y: <?php echo $this->M__app->getdaytrans(date('Y-m-d',$x1))->num_rows();?>},
            {x: '<?php echo date('Y-m-d',$x2) ?>', y: <?php echo $this->M__app->getdaytrans(date('Y-m-d',$x2))->num_rows();?>},
            {x: '<?php echo date('Y-m-d',$x3) ?>', y:<?php echo $this->M__app->getdaytrans(date('Y-m-d',$x3))->num_rows();?>},
            {x: '<?php echo date('Y-m-d',$x4) ?>', y: <?php echo $this->M__app->getdaytrans(date('Y-m-d',$x4))->num_rows();?>},
            {x: '<?php echo date('Y-m-d',$x5) ?>', y: <?php echo $this->M__app->getdaytrans(date('Y-m-d',$x5))->num_rows();?>},
            {x: '<?php echo date('Y-m-d',$x6) ?>', y: <?php echo $this->M__app->getdaytrans(date('Y-m-d',$x6))->num_rows();?>},
        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['<b>Pembelian</b>'],
        barColors:['#6dc5a3','#788ba0','#6dc5a3']


    });
</script>