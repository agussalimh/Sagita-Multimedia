<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="Ciptasoft">
      <title>
        <?php echo $title.' | '?>
        <?php echo gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop') ?>
      </title>
      <link href="<?php echo base_url()?>assets/backend/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
      <link href="<?php echo base_url()?>assets/backend/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
      <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/js/data-tables/DT_bootstrap.css" />
      <link rel="icon" type="image/png" href="<?php echo base_url('uploads/'.gettoko('logo_shop')) ?>">
      <link href="<?php echo base_url()?>assets/backend/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url()?>assets/backend/css/style-responsive.css" rel="stylesheet">
    </head>
    <body class="sticky-header">
        <style>
            .adv-table{
                width: 100%; 
                overflow-x: scroll;
                overflow-y: scroll;
                height: auto;
            }
        </style>
        <?php no_access(); ?>
        <section>
            <div class="left-side sticky-left-side">
                <center>
                    <div class="logo">
                        <a href="<?php echo site_url('myshop.aspx') ?>"><strong><span style="font-size: 20px;"><?php echo gettoko('shortname_shop') ?></span></strong></a>
                    </div>
                </center>
                <div class="logo-icon text-center">
                    <a href="<?php echo site_url('myshop.aspx') ?>"><img src="<?php echo base_url('uploads/'.gettoko('logo_shop')) ?>" style="width:30px;height:30px;" alt=""></a>
                </div>
                <div class="left-side-inner">
                    <div class="visible-xs hidden-sm hidden-md hidden-lg">
                        <div class="media logged-user">
                            <div class="media-body">
                                <h4>
                                    <a href="javascript:void(0)">
                                        <?php echo getuser('name_user') ?>  as
                                        <?php 
                                        $level=getuser('access_user'); 
                                        if($level==1)
                                        {
                                            echo "Superadmin";
                                        }
                                        else
                                        {
                                            echo "Admin";
                                        }
                                        ?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if(getuser('access_user')==1)
                    {
                        include "menu_super.php";
                    }
                    else
                    {
                        include "menu_admin.php";
                    }
                    ?>
                </div>
            </div>
            <div class="main-content" >
                <div class="header-section">
                    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
                    <div class="menu-right">
                        <ul class="notification-menu">
                            <li>
                                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <?php echo getuser('name_user') ?> as <?php $level=getuser('access_user') ;
                                    if($level==1)
                                    {
                                        echo "Superadmin";
                                    }
                                    else
                                    {
                                        echo "Admin";
                                    }
                                    ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                    <li><a href="#" onclick="modal_user()"><i class="fa fa-user"></i> <span>Edit Profil</span></a></li>
                                    <li><a href="<?php echo site_url('out.aspx') ?>" onclick="return confirm('Anda yakin ingin Keluar!'); "><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="page-heading">
                    <?php echo $this->breadcrumb->output(); ?> <br>
                    <b><a href="<?php echo base_url() ?>" target="_blank">Klik disini untuk melihat toko!</a></b>
                </div>
                <div class="wrapper">
                    <?php include $content; ?>
                    <div id="modal_user"></div>
                    <footer>
                        <center>
                            &copy;
                            <?php echo date('Y') ?> 
                            <?php echo gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop') ?>
                        </center>
                    </footer>
                </div>
            </div>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalPict" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                        <center id="modalPictBody"></center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function nomer(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
                return true;
            }
        </script>
        <script src="<?php echo base_url()?>assets/backend/js/uang.js"></script>
        <script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
        <script>
            function modal_user(){
                $.ajax({
                    url:"<?php echo site_url('modal_user.aspx')?>",
                    type:"POST",
                    data:"log=log",
                    cache:false,
                    success:function(data){
                        $("#modal_user").html(data);
                    }
                });
            }
            $("img").click(function(event){
                var src=$(this).attr('src');
                $("#modalPict").modal("show");
                $("#modalPictBody").html("<center><img src='"+src+"' style='width:100%;height:100%;'></center>");
            });
            $("form").submit(function(){
                $('button').attr('disabled','disabled');
            });
        </script>
        
        <script src="<?php echo base_url()?>assets/backend/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="<?php echo base_url()?>assets/backend/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/backend/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/backend/js/modernizr.min.js"></script>
        <script src="<?php echo base_url()?>assets/backend/js/jquery.nicescroll.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/backend/js/advanced-datatable/js/jquery.dataTables.js"></script>

        <script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/data-tables/DT_bootstrap.js"></script>
        <script src="<?php echo base_url()?>assets/backend/js/dynamic_table_init.js"></script>
        <script>
            $(".adv-table").niceScroll({
                styler:"fb",
                cursorcolor:"#65cea7", 
                cursorwidth: '6', 
                cursorborderradius: '0px', 
                background: '#424f63', 
                spacebarenabled:false, 
                cursorborder: '0',  
                zindex: '1000'
            });
            $("#dynamic-table2").dataTable();
        </script>
        <script src="<?php echo base_url()?>assets/backend/js/scripts.js"></script>
    </body>
</html>
