<div class="main-container" style="padding-left: 50px;padding-right: 50px;">
    <div class="morePost row featuredPostContainer style2">
        <div class="col-lg-12">
            <center><h1 class="title-big text-center section-title-style2"><span>DATA PENCARIAN </span></h1></center>
            <hr>
        </div>
        <div>
            <div class="row">
                <?php $no=0; foreach($all as $row): $no++ ?>
                    <div class="item col-lg-2 col-md-3 col-sm-4 col-xs-6" style="float: left;">
                        <div class="product" id="produk">
                            <div id="tinggi">
                                <div class="image" id="tinggi2">
                                    <div class="quickview">
                                        <a href="<?php echo site_url('product-details.aspx/'.$row->slug_product);?>" class="btn btn-xs btn-quickview">Lihat Detail</a>
                                    </div>
                                    <a href="<?php echo site_url('product-details.aspx/'.$row->slug_product)?>">
                                        <img src="<?php echo base_url('uploads/'.$row->image_product) ?>" style="width:80%;" alt="<?php echo $row->name_product ?>">
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
                                        <a href="<?php echo site_url('product-details.aspx/'.$row->slug_product)?>">
                                            <?php $product_name=substr($row->name_product,0,25); ?>
                                            <?php if(strlen($row->name_product)>25)
                                            {
                                                echo $product_name.'...';
                                            }
                                            else
                                            {
                                                echo $row->name_product;
                                            }
                                            ?>
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
                                        
                                        <?php if ($row->state_discount==1) { ?>
                                            <span class="old-price" style="font-size: 12px;">
                                                Rp.<?php echo uang($row->price_product) ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="action-control">
                                <center>
                                    <a href="javascript:void(0)" onclick="tampil_modal('<?php echo $row->id_product ?>')" style="width:80%;" class="btn btn-primary btn-md">
                                        <span class="add2cart">
                                            <i class="glyphicon glyphicon-shopping-cart"></i>
                                            <span class="hidden-xs"></span>
                                        </span>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <hr>
                <br>
            </div>
            <div class="row xsResponse"><center><?php echo $page; ?></center></div>
        </div>
    </div>
</div>
