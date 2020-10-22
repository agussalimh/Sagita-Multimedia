<script src="<?php echo base_url()?>assets/backend/js/jquery.nicescroll.js"></script>
<?php 
$jumlah=array();
 foreach ($this->cart->contents() as $items): 
    $jumlah[]=$items['price'];
 endforeach;
?>
<div class="nav navbar-nav navbar-right hidden-xs">
    <div class="dropdown  cartMenu ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
            <i class="fa fa-shopping-cart"> </i> 
            <span class="cartRespons"> Keranjang (<?php echo uang(array_sum($jumlah)) ?>) </span>
            <?php if (count($this->cart->contents())>0): ?>
                <b class="caret"></b>
            <?php endif ?>
        </a>
        <?php if (count($this->cart->contents())!=0): ?>
        <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
            <div class="w100 miniCartTable scroll-pane2" style="height: 280px;overflow-y: auto;">
                <table>
                    <tbody>
                    <?php 
                    $jumlah=array();
                     foreach ($this->cart->contents() as $items): 
                        $jumlah[]=$items['price'];
                    ?>
                        <tr class="miniCartProduct">
                            <td class="miniCartProductThumb">
                                <div>
                                    <a href="<?php echo site_url('product-details.aspx/'.$items['id_product']);?>"> <img src="<?php echo base_url('uploads/'.$items['picture']) ?>" alt="img">
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="miniCartDescription">
                                    <h4>
                                        <a href="<?php echo site_url('product-details.aspx/'.$items['id_product']);?>"> <?php echo $items['name'] ?> </a>
                                    </h4>
                                    <span>Jumlah: <b><?php echo $items['qty'] ?> item</b></span>
                                    <div class="price">
                                        <span> Rp.<?php echo uang($items['price']) ?> </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="removeCart('<?php echo $items['rowid']?>')" class="btn btn-xs btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="miniCartFooter text-center">
                <h3 class="text-center subtotal"> Total: Rp.<?php echo uang(array_sum($jumlah)); ?> </h3>
                <div class="row">
                    <a href="javascript:void(0)" onclick="nullCart()" class="btn btn-sm btn-danger"> Kosongkan Keranjang </a>
                    <a href="<?php echo site_url() ?>viewcart.aspx" class="btn btn-sm btn-info"> Lihat Keranjang Dan Proses Pemesanan </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
    <div class="search-box">
        <div class="input-group">
            <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.mCustomScrollbar.js"></script>
<script>
    $(".getFullSearch").on('click', function (e) {
        $('.search-full').addClass("active"); 
        e.preventDefault();
    });
    $('.search-close').on('click', function (e) {
        $('.search-full').removeClass("active");
        e.preventDefault();
    });
    function removeCart(id) {
        $("#loading").addClass('bore');
        $.ajax({
            url: '<?php echo site_url()?>removecart.aspx/'+id,
            type: 'POST',
            dataType: 'json',
            data: "",
            success:function(data){
                $("#loading").removeClass('bore');
                cartSmall();
                cartBig();
                cartReal();
                $.gritter.add({
                    title: "Sukses!",
                    text: "Data keranjang berhasil di hapus",
                    sticky: false,
                    time: 6200
                });
            }
        });
    }
    function nullCart() {
        $("#loading").addClass('bore');
        $.ajax({
            url: '<?php echo site_url()?>nullcart.aspx',
            type: 'POST',
            data: "",
            success:function(data){
                $("#loading").removeClass('bore');
                cartSmall();
                cartBig();
                cartReal();
                $.gritter.add({
                    title: "Sukses!",
                    text: "Data keranjang berhasil di kosongkan",
                    sticky: false,
                    time: 6200
                });
            }
        });
    }
    $("html").niceScroll({
        styler:"fb",
        cursorcolor:"#ccc",
        cursorwidth: '9', 
        cursorborderradius: '5px', 
        background: '#fff', 
        spacebarenabled:false, 
        autohidemode:true, 
        cursorborder: '1',  
        zindex: '1000'
    });
    $(".scroll-pane2").mCustomScrollbar({
        advanced: {
            updateOnContentResize: true

        },

        scrollButtons: {
            enable: false
        },

        mouseWheelPixels: "200",
        theme: "dark-2"

    });
</script>