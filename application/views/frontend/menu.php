<ul class="nav navbar-nav">
    <li class="<?php echo active($active,'beranda') ?>">
        <a href="<?php echo site_url() ?>" class="soft">Beranda</a>
    </li>
    <li class="dropdown <?php echo active($active,'category') ?>">
        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
        Kategori<b class="caret"> </b> </a>
        <ul class="dropdown-menu" style="width: 450px;">
            <li class="megamenu-content">
                <?php foreach ($category as $key => $row): ?>
                <ul class="col-lg-6 unstyled noMarginLeft newCollectionUl">
                    <li>
                        <a href="<?php echo site_url()?>mycategory.aspx/<?php echo $row->id_category ?>" class="soft">
                            <?php echo $row->category ?>
                        </a>
                    </li>
                </ul>
                <?php endforeach ?>
            </li>
            <?php if(count($category)==0){echo "<center><b>Belum ada kategori tersedia...</b></center><br><br>";} ?>
        </ul>
    </li>
    <li class="<?php echo active($active,'order') ?>">
        <a href="<?php echo site_url()?>order.aspx" class="soft">Cek Pesanan</a>
    </li>
    <li class="<?php echo active($active,'ongkir') ?>">
        <a href="<?php echo site_url() ?>ongkir.aspx" class="soft">Cek Ongkir</a>
    </li>
    <li class="<?php echo active($active,'pricelist') ?>">
        <a href="<?php echo site_url()?>pricelist.aspx" class="soft">Daftar Harga</a>
    </li>
    <li class="dropdown <?php echo active($active,'page') ?>">
        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
        Halaman<b class="caret"> </b> </a>
        <ul class="dropdown-menu" style="width: 450px;">
            <li class="megamenu-content">
                <ul class="col-lg-12 unstyled noMarginLeft newCollectionUl">
                    <li class="<?php echo active($active,'how') ?>">
                        <a href="<?php echo site_url()?>howtobuy.aspx">Cara Pembelian</a>
                    </li>
                    <li class="<?php echo active($active,'about') ?>">
                        <a href="<?php echo site_url()?>aboutus.aspx">Tentang Kami</a>
                    </li>
                    <li class="<?php echo active($active,'about') ?>">
                        <a href="<?php echo site_url()?>testimony.aspx">Testimoni</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="<?php echo active($active,'auth') ?>">
        <a href="<?php echo site_url()?>auth.aspx" class="soft">Login</a>
    </li>
</ul>