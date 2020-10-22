<div class="col-lg-9 col-md-9 col-sm-7">
    <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
            <div class="cartContent w100" style="overflow-x: auto;" id="cartContent">
                <table class="table table-bordered table-responsive" style="width:100%;font-size: 13px;">
                    <thead>
                        <tr class="CartProduct cartTableHeader">
                            <th>No.</th>
                            <th>Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $jumlah=array();
                        $no=0;
                        foreach ($this->cart->contents() as $items): 
                        $no++;
                            $jumlah[]=$items['price'];
                        ?>
                        <tr>
                            <td>
                                <center><?php echo $no ?>.</center>
                            </td>
                            <td>
                                <center>
                                    <a href="<?php echo site_url('product-details.aspx/'.$items['slug']) ?>">
                                        <img src="<?php echo base_url('uploads/'.$items['picture']) ?>" style="width: 80px;height: 110px;">
                                        <br>
                                        <b>
                                            <?php echo $items['name'] ?>
                                        </b>
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    Rp.<?php echo uang($items['price']/$items['qty'])?>
                                </center>
                            </td>
                            <td class="price">
                                <center><?php echo $items['qty'] ?></center>
                            </td>
                            <td class="price">
                                <center>
                                    Rp.<?php echo uang($items['price']) ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $items['information'] ?>
                                </center>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <br>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
    <div class="contentBox">
        <div class="w100 costDetails">
            <div class="table-block" id="order-detail-content">
                <div class="w100 cartMiniTable">
                    <table id="cart-summary" class="std table">
                        <tbody>
                            <tr>
                                <td>Total Harga</td>
                                <td class="price">Rp.<?php echo uang(array_sum($jumlah)) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <?php if(array_sum($jumlah)!=0){?>
                <a class="btn btn-primary btn-lg btn-block " title="checkout" href="checkout.aspx" style="margin-bottom:20px"> Proses Pemesanan &nbsp; <i class="fa fa-arrow-right"></i> </a>
               <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/backend/js/jquery.nicescroll.js"></script>
<script>
    $("#cartContent").niceScroll({
        styler:"fb",
        cursorcolor:"#ccc",
        cursorwidth: '6', 
        cursorborderradius: '5px', 
        background: '#fff', 
        spacebarenabled:false, 
        autohidemode:false, 
        cursorborder: '1',  
        zindex: '1000'
    });
</script>