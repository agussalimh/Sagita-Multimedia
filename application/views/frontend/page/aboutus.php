<div class="container main-container">
    <div class="morePost row featuredPostContainer style2">
        <div class="container">
            <div class="col-md-12">
                <center>
                    <h1 class="title-big text-center section-title-style2">
                        <span>
                            TENTANG KAMI
                        </span>
                    </h1>
                </center>
                <hr>
                <?php 
                    $time      =date('H');
                    $pelengkap =gettoko('longname_shop')?gettoko('longname_shop'):gettoko('shortname_shop');
                    if($time>=10 && $time<=13)
                    {
                        $judul ="Selamat Siang!";
                        $text  ="Selamat Siang Sobat! Selamat berkenalan dengan ".$pelengkap;
                    }
                    elseif($time<10)
                    {
                        $judul ="Selamat Pagi!";
                        $text  ="Selamat Pagi Sobat! Semoga pagi ini semakin semangat. Silahkan melihat detail ".$pelengkap;
                    }
                    elseif($time>14 && $time<=18)
                    {
                        $judul ="Selamat Sore!";
                        $text  ="Selamat Sore Sobat! Silahkan melihat detail ".$pelengkap;
                    }
                    elseif($time>18)
                    {
                        $judul ="Selamat Malam!";
                        $text  ="Selamat Malam Sobat! Silahkan melihat detail ".$pelengkap;
                    }
                    else
                    {
                        $judul ="Halo!";
                        $text  ="Halo Sobat! Silahkan melihat detail ".$pelengkap;
                    }
                ?>
                <div class="col-md-4">
                    <center>
                        <img src="<?php echo base_url('uploads/'.gettoko('logo_shop')) ?>" alt="" width="300px;" height="300px" class="popovers" data-trigger="hover" data-placement="top" data-content="<?php echo $text ?>" data-original-title="<?php echo $judul ?>">
                    </center>
                </div>
                <div class="col-md-8">
                    <?php echo $page['about_us'] ?>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div id="if">
                <table class="table">
                    <tr>
                        <th width="200px">Nama Pendek Toko</th>
                        <td><?php echo gettoko('shortname_shop') ?></td>
                    </tr>
                    <tr>
                        <th>Nama Panjang Toko</th>
                        <td><?php echo gettoko('longname_shop') ?></td>
                    </tr>
                    <tr>
                        <th>Motto/Slogan Toko</th>
                        <td><?php echo gettoko('motto_shop') ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Toko</th>
                        <td><?php echo gettoko('location_shop') ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pemilik</th>
                        <td><?php echo gettoko('name_manage') ?></td>
                    </tr>
                    <tr>
                        <th>PIN BBM</th>
                        <td><?php echo gettoko('bbm_contact') ?></td>
                    </tr>
                    <tr>
                        <th>Nomor WA</th>
                        <td><?php echo gettoko('wa_contact') ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?php echo gettoko('phone_contact') ?></td>
                    </tr>
                    <tr>
                        <th>Email Toko</th>
                        <td><?php echo gettoko('email_shop') ?></td>
                    </tr>
                    <?php $prop['propinsi']=gettoko('propinsi_shop') ?>
                    <?php $prop['kabupaten']=gettoko('kabupaten_shop') ?>
                    <tr>
                        <th>Provinsi</th>
                        <td><?php $this->load->view('frontend/page/rajaongkir/NameProvince.php',$prop); ?></td>
                    </tr>
                    <tr>
                        <th>Kabupaten</th>
                        <td><?php $this->load->view('frontend/page/rajaongkir/NameCity.php',$prop); ?></td>
                    </tr>
                </table>
            </div>
            <br><br><br>
        </div>
    </div>
</div>
<br>
<script src="<?php echo base_url()?>assets/backend/js/bootstrap.min.js"></script>
<script>
    $('.popovers').popover();
</script>