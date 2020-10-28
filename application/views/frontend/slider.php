<div class="col-md-8">
    <div class=" image-show-case-wrapper center-block relative col-lg-12">
        <div id="imageShowCase" class="owl-carousel owl-theme">
            <?php $no=0; foreach($slider as $row): $no++ ?>
            <div class="product-slide">
                <div class="box-content-overly box-content-overly-white">
                    <div class="box-text-table">
                        <div class="box-text-cell ">
                        </div>
                    </div>
                </div>
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('uploads/'.$row->slider) ?>" alt="img">
                </a>
            </div>
            <?php endforeach; ?>
            <?php if(count($slider)==0){ ?>
                <div class="product-slide">
                <div class="box-content-overly box-content-overly-white">
                    <div class="box-text-table">
                        <div class="box-text-cell ">
                        </div>
                    </div>
                </div>
                <a href="#">
                    <img class="img-responsive" 
                    src="<?php echo base_url('assets/img/Slider.png') ?>" alt="img">
                </a>
            </div>
            <?php  } ?>
        </div>

        <div style="clear:both;"></div>
        <a id="ps-next" class="ps-nav"> <img src="<?php echo base_url() ?>assets/images/site/arrow-right.png" alt="N E X T"> </a> <a id="ps-prev" class="ps-nav">
        <img src="<?php echo base_url() ?>assets/images/site/arrow-left.png" alt="P R E V"></a>
    </div>
</div>
<div class="col-md-4">
    <div style="margin-left: 20px;margin-right: 20px;">
        <h3>
            <br>
            <b>Produk Terbaru</b>
            <a id="nextBrand" class="link pull-right carousel-nav">
                <i class="fa fa-angle-right"></i>
            </a>
            <a id="prevBrand" class="link pull-right carousel-nav">
                <i class="fa fa-angle-left"></i>
            </a>
        </h3>
        <hr>
        <br>
        <ul class="no-margin brand-carousel owl-carousel owl-theme" style="padding-left: 5px;">
            <?php $no=0; foreach($new as $n): $no++ ?>
                <li>
                    <div class="product" style="height: 200px;padding:0px;width: 120px;">
                            <div style="height: 80%;">
                                <div class="image" style="height: 130px;">
                                    <a href="<?php echo site_url('product-details.aspx/'.$n['slug_product'])?>">
                                        <img src="<?php echo base_url('uploads/'.$n['image_product']) ?>" style="width:100px;height:130px;">
                                    </a>
                                    <?php if ($n['state_discount']==1) { ?>
                                        <div class="promotion" style="bottom: -0px;">
                                            <span class="discount" style="font-size: 15px;">
                                                <?php $cut=ceil(($n['discount_product']/$n['price_product'])*100) ?>
                                                <?php echo 100-$cut ?> %
                                            </span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="description" style="min-height: 65px;">
                                    <b style="font-size: 12px;font-weight: 798;">
                                        <a href="<?php echo site_url('product-details.aspx/'.$n['id_product'])?>">
                                            <?php $product_name=substr($n['name_product'],0,25); ?>
                                            <?php if(strlen($n['name_product'])>25){
                                                echo $product_name.'...';
                                            }else{
                                                echo $n['name_product'];
                                            } ?>
                                        </a>
                                    </b>
                                    <div class="price" style="font-size: 13px;">
                                        <?php if ($n['state_discount']==1) { ?>
                                            <span style="color: #e74c3c;">
                                                Rp.<?php echo uang($n['discount_product']) ?>
                                            </span>
                                        <?php }else{ ?>
                                            <span style="color: #e74c3c;">
                                                Rp.<?php echo uang($n['price_product']) ?>
                                            </span>
                                        <?php } ?>
                                        <br>
                                        <?php if ($n['state_discount']==1) { ?>
                                            <span class="old-price" style="font-size: 12px;">
                                                Rp.<?php echo uang($n['price_product']) ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
