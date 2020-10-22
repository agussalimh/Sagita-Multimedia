<!DOCTYPE html>
<html lang="en">
	<?php 
        $skin=$this->db->query("select skin from shop_skin where skin_status=1")->row_array();
        if($skin>0)
        {
            $skin_aktif=$skin['skin'];
        }
        else
        {
            $skin_aktif='style-3';
        }
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="<?php echo gettoko('shortname_shop') ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url('uploads/'.gettoko('logo_shop')) ?>">
        <title>
            <?php echo $title.' | '?>
            <?php echo gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop') ?>
        </title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/<?php echo $skin_aktif;?>.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/backend/js/gritter/css/jquery.gritter.css" />
        <script>
            paceOptions = {
                elements: true
            };
            :root{
                overflow-x:hidden;
            }
        </script>
        <style>
            
            .item{
                height: auto;
            }
            @media (min-width: 576px) {
                #produk{
                    height: 318px;
                    padding:2px;
                }
                #tinggi{
                    height: 85%;
                }
                #tinggi2{
                    height: 200px;
                }
                .item{
                    height: 320px;
                }
            }

            
            @media (min-width: 768px) {
                #produk{
                    height: 318px;
                    padding:2px;
                }
                #tinggi{
                    height: 85%;
                }
                #tinggi2{
                    height: 200px;
                }
                .item{
                    height: 320px;
                }
            }

            
            @media (min-width: 992px) {
                #produk{
                    height: 318px;
                    padding:2px;
                }
                #tinggi{
                    height: 85%;
                }
                #tinggi2{
                    height: 200px;
                }
                .item{
                    height: 320px;
                }
            }

            
            @media (min-width: 1200px) {
                #produk{
                    height: 318px;
                    padding:2px;
                }
                #tinggi{
                    height: 85%;
                }
                #tinggi2{
                    height: 200px;
                }
                .item{
                    height: 320px;
                }
            }

            .title-big{
                font-size: 30px;
            }
            .bore{
                opacity: .5;
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1040;
                background-color: #fff;
            }
            .bore:after{
               left: 50%;
               position: absolute;
               top:6;
               bottom: 50%;
               transform:scale(1.5);
               margin-left: -5px;
               content: url("<?php echo base_url()?>/assets/css/AjaxLoader.gif");
            }
        </style>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/backend/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url() ?>assets/js/pace.min.js"></script>

    </head>
    <body style="overflow-x: hidden; width:100%;">
        <div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
            <?php include "header.php"; ?>
            <div class="container">
                <span id="keranjangKecil">
                   <?php 
                        include "total_cart.php"; 
                        include "cart.php";
                   ?>
               </span>
                <div class="navbar-collapse collapse">
                    <?php include "menu.php"; ?>
                    <span id="keranjang">
                        <?php 
                            include "cart_mobile.php";
                        ?>
                    </span>
                </div>
            </div>
            <?php include "search.php"; ?>
        </div>
        <?php 
            if (isset($slider_yes)) 
            { 
        ?>
            <div class="main-container headerOffset" style="padding-top:105px;min-height: 473px;">
                <?php alert() ?>
                <?php include "slider.php";?>
                <br><br>
            </div>
        <?php 
            }
            else
            {
                echo "<div class='headerOffset'></div>";
            }
        ?>
        <?php echo $this->breadcrumb->output(); ?>
        
        <?php include $content; ?>
        <div class="row xsResponse">
            <div id="row-modal"></div>
        </div>
        <?php include "footer.php"; ?>
        <script>
            function tampil_modal(id) {
                $("#loading").addClass('bore');
                $.ajax({
                    url: '<?php echo site_url("verifCart.aspx")?>',
                    type: 'POST',
                    data: {"id": id},
                    success:function(data){
                        $("#loading").removeClass('bore');
                        $("#row-modal").html(data);
                        $("#ModalCart").modal("show");
                    }
                })
            }

            function cartSmall() {
                $.ajax({
                  url: '<?php echo site_url('refreshCartKecil.aspx') ?>',
                  type: 'POST',
                  data:"",
                  success:function(data){
                    $("#keranjangKecil").html(data);
                  }  
                });
            }

            function cartBig() {
                $.ajax({
                  url: '<?php echo site_url('refreshCart.aspx') ?>',
                  type: 'POST',
                  data:"",
                  success:function(data){
                    $("#keranjang").html(data);
                  }  
                });
            }

            function cartReal() {
                $.ajax({
                  url: '<?php echo site_url('refreshRealCart.aspx') ?>',
                  type: 'POST',
                  data:"",
                  success:function(data){
                    $("#realCart").html(data);
                  }  
                });
            }
           
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/idangerous.swiper-2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/gritter/js/jquery.gritter.js"></script>

        <script>
            var mySwiper = new Swiper('.swiper-container', {
                pagination: '.box-pagination',
                keyboardControl: true,
                paginationClickable: true,
                slidesPerView: 'auto',
                autoResize: true,
                resizeReInit: true,
            })

            $('.prevControl').on('click', function (e) {
                e.preventDefault()
                mySwiper.swipePrev()
            })
            $('.nextControl').on('click', function (e) {
                e.preventDefault()
                mySwiper.swipeNext()
            });
            $("form").submit(function(){
                $('button').attr('disabled','disabled');
            });
        </script>

        <script src="<?php echo base_url()?>assets/js/jquery.cycle2.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.parallax-1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.mCustomScrollbar.js"></script>
        <script src="<?php echo base_url()?>assets/js/grids.js"></script>
        <script src="<?php echo base_url()?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.touchspin.js"></script>
        <script src="<?php echo base_url()?>assets/js/home.js"></script>
        <script src="<?php echo base_url()?>assets/js/script.js"></script>

        <div id="loading"></div>
    </body>
</html>