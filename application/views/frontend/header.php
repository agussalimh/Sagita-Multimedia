<div class="navbar-top">
    <div class="container" style="padding-top: 3px">
        <div class="row">
            <div class="col-lg-8">
                <div class="pull-left ">
                    <ul class="userMenu">
                        <li>
                        <?php if (gettoko('longname_shop')!=""): ?>
                            <a href="<?php echo base_url() ?>">
                                <span style="font-size:20px;">
                                <?php echo gettoko('shortname_shop') ?> 
                                <span class="hidden-xs">(<?php echo gettoko('longname_shop') ?>)
                                </span>
                                </span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo base_url() ?>">
                                <span style="font-size:20px;">
                                <?php echo gettoko('shortname_shop') ?> 
                                </span>
                            </a>
                        <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pull-right">
                    <ul class="userMenu">
                        <?php 
                        $fb=gettoko('facebook');
                        $tw=gettoko('twitter');
                        $ig=gettoko('instagram');
                        $go=gettoko('google');
                        $yt=gettoko('youtube');
                        if($fb!="" && !is_null($fb)){ ?>
                            <li>
                                <a href="<?php echo $fb ?>" target="_blank"> 
                                    <i class=" fa fa-facebook"> &nbsp; </i> 
                                </a>
                            </li>
                        <?php } ?>
                        <?php if($tw!="" && !is_null($tw)){ ?>
                             <li>
                                <a href="<?php echo $tw ?>" target="_blank"> 
                                    <i class=" fa fa-twitter"> &nbsp; </i> 
                                </a>
                            </li>
                        <?php } ?>
                        <?php if($ig!="" && !is_null($ig)){ ?>
                             <li>
                                <a href="<?php echo $ig ?>" target="_blank"> 
                                    <i class=" fa fa-instagram"> &nbsp; </i> 
                                </a>
                            </li>
                        <?php } ?>
                        <?php if($go!="" && !is_null($go)){ ?>
                             <li>
                                <a href="<?php echo $go ?>" target="_blank"> 
                                    <i class=" fa fa-google-plus"> &nbsp; </i> 
                                </a>
                            </li>
                        <?php } ?>
                        <?php if($yt!="" && !is_null($yt)){ ?>
                            <li>
                                <a href="<?php echo $yt ?>" target="_blank"> 
                                    <i class=" fa fa-youtube"> &nbsp; </i> 
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.navbar-top-->