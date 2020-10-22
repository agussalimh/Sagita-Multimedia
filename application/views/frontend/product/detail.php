<style>
    img{
        cursor: pointer;
    }
</style>
<div class="container main-container">
    <div class="morePost row featuredPostContainer style2">
        <div class="col-lg-12">
            <center>
                <h1 class="title-big text-center section-title-style2">
                    <span>DETAIL PRODUK <?php echo strtoupper($get['name_product'])?></span>
                </h1>
            </center>
            <hr>
        </div>
        <div class="container">
            <div class="row xsResponse">
                <div class="col-md-4 panel panel-default">
                    <center>
                        <img src="<?php echo base_url('uploads/'.$get['image_product']) ?>" style="width:285px;height:380px;" alt="" class="zoom-">
                        <?php if ($get['state_discount']==1) { ?>
                            <div class="promotion" style="top: 0px;">
                                <span class="discount" style="font-size: 20px;">
                                    <?php $cut=ceil(($get['discount_product']/$get['price_product'])*100) ?>
                                    <?php echo 100-$cut ?> %
                                </span>
                            </div>
                        <?php } ?>
                    </center>
                </div>
                <div class="col-md-6">
                    <div class="product-details-info-wrapper">
                        <h2 class="product-details-product-title">
                            <b><?php echo $get['name_product']?></b>
                        </h2>
                        <div class="product-price">
                            <?php if ($get['state_discount']==1) { ?>
                                <span class="price-sales" style="color: #e74c3c;">
                                    Rp.<?php echo uang($get['discount_product']) ?>
                                </span>
                            <?php }else{ ?>
                                <span class="price-sales" style="color: #e74c3c;">
                                    Rp.<?php echo uang($get['price_product']) ?>
                                </span>
                            <?php } ?>
                            <?php if ($get['state_discount']==1) { ?>
                                <span class="price-standard">
                                    Rp.<?php echo uang($get['price_product']) ?>
                                </span>
                            <?php } ?>
                        </div>
                        <div class="row row-cart-actions clearfix">
                            <div class="col-sm-10">
                                <b>Kategori</b>: <p><?php echo $cate['category']?></p>
                                <b>Stok</b>: <?php echo $get['stock_product']?><br><br>
                                <b>Keterangan</b>: <p><?php echo $get['information_product']?></p><br>
                                <?php
                                    $title = 'Produk '.$get['name_product'] ;
                                    $summary = $get['information_product'];
                                    $image=base_url('uploads/'.$get['image_product']);
                                    $url = base_url('product_details.aspx/'.$get['id_product']);
                                ?>
                                Berbagi di :
                                <a 
                                onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $url; ?>', '', 'toolbar=0,status=0,width=550,height=400');" 
                                target="_parent" 
                                href="javascript: void(0)" 
                                class="btn btn-sm" 
                                style="background-color: #3473db;color:white;" 
                                title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a 
                                onclick="window.open('http://twitter.com/intent/tweet?text=<?php echo $title;?>&url=<?php echo $url; ?>&via=berbagiyuks', '', 'toolbar=0,status=0,width=550,height=400');" 
                                target="_parent" 
                                href="javascript: void(0)" 
                                class="btn btn-info btn-sm" 
                                title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo $url; ?>','','scrollbars=yes,width=800,height=400');popUp.focus();return false" class="btn btn-danger btn-sm" title="Google Plus">
                                   <i class="fa fa-google-plus"></i>
                                </a>
                                <br><br><br>
                                <a 
                                href="javascript:void(0)" 
                                onclick="tampil_modal('<?php echo $get['id_product']?>')" 
                                class="btn btn-block btn-primary">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                    Tambah Ke Keranjang
                                </a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <ul class="no-margin brands-carousel owl-carousel owl-theme">
                        <?php foreach ($productTerkait as $row): ?>
                        <li>
                            <div class="product" style="height: 200px;padding:2px;">
                                <div style="height: 80%;">
                                    <div class="image" style="height: 130px;">
                                        <a href="<?php echo site_url('product-details.aspx/'.$row->slug_product)?>">
                                            <img src="<?php echo base_url('uploads/'.$row->image_product) ?>" style="width:100px;height:130px;" >
                                        </a>
                                        <?php if ($row->state_discount==1) { ?>
                                            <div class="promotion" style="bottom: -0px;">
                                                <span class="discount" style="font-size: 15px;">
                                                    <?php $cut=ceil(($row->discount_product/$row->price_product)*100) ?>
                                                    <?php echo 100-$cut ?> %
                                                </span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="description" style="min-height: 65px;">
                                        <b style="font-size: 12px;font-weight: 798;">
                                            <a href="<?php echo site_url('product-details.aspx/'.$row->id_product)?>">
                                                <?php $product_name=substr($row->name_product,0,25); ?>
                                                <?php if(strlen($row->name_product)>25){
                                                    echo $product_name.'...';
                                                }else{
                                                    echo $row->name_product;
                                                } ?>
                                            </a>
                                        </b>
                                        <div class="price" style="font-size: 13px;">
                                            <?php if ($row->state_discount==1) { ?>
                                                <span style="color: #e74c3c;">
                                                    Rp.<?php echo uang($row->discount_product) ?>
                                                </span>
                                            <?php }else{ ?>
                                                <span style="color: #e74c3c;">
                                                    Rp.<?php echo uang($row->price_product) ?>
                                                </span>
                                            <?php } ?>
                                            <br>
                                            <?php if ($row->state_discount==1) { ?>
                                                <span class="old-price" style="font-size: 12px;">
                                                    Rp.<?php echo uang($row->price_product) ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <center style="font-weight: 600;">Produk Berkategori Sama</center>
                </div>
            </div>
            <br>
            <div class="row xsResponse">
            <center>
                <div class="col-md-4">
                    <center>
                        <?php foreach ($all as $pict): ?>
                            <div class="col-md-6" style="padding-bottom: 10px;float: left;">
                                <img src="<?php echo base_url('uploads/'.$pict->image) ?>" style="width:100px;height:130px;" alt="" class="zoom-">
                            </div>
                        <?php endforeach ?>
                    </center>
                </div>
            <center>
            </div>
        </div>
    </div>
</div>
<hr>
<script>
    $(".zoom-").click(function(event){
        var src=$(this).attr('src');
        $("#modalPict").modal("show");
        $("#modalPictBody").html("<center><img src='"+src+"' style='width:285px;height:380px;'></center>");
    });
</script>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalPict" class="modal signUpContent fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <center id="modalPictBody"></center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
