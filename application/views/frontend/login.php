
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="AGUS SALIM HADJRIANTO">
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/'.gettoko('logo_shop')) ?>">
    <title>
        Login
        <?php echo gettoko('longname_shop')?gettoko('longname_shop'):gettoko('longname_shop') ?>
    </title>
    <link href="<?php echo base_url()?>assets/backend/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/backend/css/style-responsive.css" rel="stylesheet">
</head>

<body class="login-body">

<div class="container">
    <br>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <center><?php alert() ?></center>
    </div>
    <form class="form-signin" method="post" action="<?php echo site_url('process.aspx') ?>">
        <div class="form-signin-heading text-center">
            <img src="<?php echo base_url('uploads/'.gettoko('logo_shop')) ?>" width="150px" height="150px" alt=""/>
        </div>
        <div class="login-wrap">
            <center>
                <b>
                    <u>
                        <h4>
                        Login 
                        <?php if (gettoko('longname_shop')!=""): ?>
                            <?php echo gettoko('shortname_shop') ?> 
                            (<?php echo gettoko('longname_shop') ?>)
                        <?php else: ?>
                            <?php echo gettoko('shortname_shop') ?> 
                        <?php endif; ?>
                        </h4>
                    </u>
                </b>
            </center>
            <br>
            <input type="text" required class="form-control" name="username" placeholder="Username" autofocus>
            <input type="password" required class="form-control" name="password" placeholder="Password">
            <button type="submit" class="btn btn-lg btn-block btn-success" type="submit">
                <i class="fa fa-check"></i> Login
            </button>
            <br>
            <center><a href="<?php echo site_url() ?>"> &laquo; Kembali</a> </center>
            <center>  &copy; <?php echo date('Y') ?> <?php echo gettoko('shortname_shop') ?></center>
        </div>
    </form>

</div>
<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/modernizr.min.js"></script>
</body>
</html>
