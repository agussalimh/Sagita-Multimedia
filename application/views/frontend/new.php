<div class="container">
    <div class="width100 section-block">
        <h3 class="section-title">
            <br>
            <b>Produk Terbaru</b>
            <a id="nextBrand" class="link pull-right carousel-nav"> 
                <i class="fa fa-angle-right"></i>
            </a> 
            <a id="prevBrand" class="link pull-right carousel-nav"> 
                <i class="fa fa-angle-left"></i> 
            </a>
            <br><br>
        </h3>
        <div class="row">
            <div class="col-lg-12">
                <ul class="no-margin brand-carousel owl-carousel owl-theme">
                    <?php $no=0; foreach($new as $n): $no++ ?>
                        <li>
                            <center>
                                <img src="<?php echo base_url('uploads/'.$n['image_product']) ?>" alt="img" height="130px" width="150px"> 
                                <b style="font-size: 11px;"><?php echo $n['name_product'] ?></b>
                            </center>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>