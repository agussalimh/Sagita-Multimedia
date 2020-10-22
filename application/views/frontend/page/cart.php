<style>
    tr.CartProduct td, tr.CartProduct th{
        padding: 15px;
    }
</style>
<div class="container main-container">
    <?php alert(); ?>
    <div class="morePost row featuredPostContainer style2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
                    <h1 class="section-title-inner"><span><i
                            class="glyphicon glyphicon-shopping-cart"></i> Keranjang Belanja</span></h1>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
                    <h4 class="caps"><a href="<?php echo site_url() ?>"><i class="fa fa-chevron-left"></i> Kembali Belanja </a></h4>
                </div>
            </div>
            <div class="row"  id="realCart">
                <?php include "realcart.php" ?>
            </div>
        </div>
    </div>
</div>
<hr>