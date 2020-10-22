<ul class="nav nav-pills nav-stacked custom-nav">
    <li class="<?php echo active($active,'dashboard') ?>">
        <a href="<?php echo site_url()?>myshop.aspx">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
        </a>
    </li>
    <li class="menu-list <?php echo active_open($active_open,'master') ?>">
        <a href="#">
            <i class="fa fa-th"></i> 
            <span>Master Toko</span>
        </a>
        <ul class="sub-menu-list">
            <li class="<?php echo active($active,'category') ?>">
                <a href="<?php echo site_url()?>category.aspx">
                    <i class="fa fa-bars"></i> Kategori
                </a>
            </li>
            <li class="<?php echo active($active,'product') ?>">
                <a href="<?php echo site_url()?>product.aspx">
                    <i class="fa fa-archive"></i> Produk
                </a>
            </li>
            <li class="<?php echo active($active,'bank') ?>">
                <a href="<?php echo site_url()?>bank.aspx">
                    <i class="fa fa-money"></i> 
                    <span>Bank</span>
                </a>
            </li>
            <li class="<?php echo active($active,'pay') ?>">
                <a href="<?php echo site_url()?>pay.aspx">
                    <i class="fa fa-usd"></i> 
                    <span>Data Pembayaran</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="<?php echo active($active,'transaction') ?>">
        <a href="<?php echo site_url()?>transaction.aspx">
            <i class="fa fa-refresh"></i> 
            <span>Transaksi</span>
        </a>
    </li>
    <li class="menu-list <?php echo active_open($active_open,'setting') ?>">
        <a href="#">
            <i class="fa fa-cogs"></i> 
            <span>Setting</span>
        </a>
        <ul class="sub-menu-list">
            <li class="<?php echo active($active,'shop') ?>">
                <a href="<?php echo site_url()?>setting.aspx">
                    <i class="fa fa-home"></i> 
                    <span>Setting Toko</span>
                </a>
            </li>
            <li class="<?php echo active($active,'page') ?>">
                <a href="<?php echo site_url()?>page.aspx">
                    <i class="fa fa-book"></i> 
                    <span>Setting Halaman</span>
                </a>
            </li>
            <li class="<?php echo active($active,'slider') ?>">
                <a href="<?php echo site_url()?>slider.aspx">
                    <i class="fa fa-picture-o"></i> 
                    <span>Setting Slider</span>
                </a>
            </li>
            <li class="<?php echo active($active,'skin') ?>">
                <a href="<?php echo site_url()?>skin.aspx">
                    <i class="fa fa-desktop"></i> 
                    <span>Setting Tema</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="<?php echo active($active,'user') ?>">
        <a href="<?php echo site_url()?>user.aspx">
            <i class="fa fa-user"></i> 
            <span>User</span>
        </a>
    </li>
    <li class="<?php echo active($active,'testimoni') ?>">
        <a href="<?php echo site_url()?>testimoni.aspx">
            <i class="fa fa-comments-o"></i> 
            <span>Testimoni</span>
        </a>
    </li>
</ul>