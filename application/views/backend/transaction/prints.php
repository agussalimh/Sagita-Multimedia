<link href="<?php echo base_url()?>assets/backend/css/style.css" rel="stylesheet" media="print">
<link href="<?php echo base_url()?>assets/backend/css/style-responsive.css" rel="stylesheet" media="print">
<?php 
    if($get['bank']=='cod')
    {
        $pem='COD';
    }
    else
    {
        $pem='';
    }
    $propinsi  =$get['province']; 
    $kabupaten =$get['city'];
    $prov      =getProvinsi($propinsi);
    $city      =getKabupaten($kabupaten);
?>
<div class="panel">
    <div class="panel-body invoice">
        <div class="row">
            <center>
                <p>
                    <img class="inv-logo" src="<?php echo base_url('uploads/'.gettoko('logo_shop')) ?>" width="200px" height="200px" alt=""/><br>
                    <?php echo gettoko('location_shop') ?><br>
                    <?php 
                    $prop['propinsi']=gettoko('propinsi_shop');  
                    $prop['kabupaten']=gettoko('kabupaten_shop'); 
                    
                    $this->load->view('frontend/page/rajaongkir/NameCity.php',$prop); 
                    ?> - 
                    <?php 
                    $this->load->view('frontend/page/rajaongkir/NameProvince.php',$prop); 
                    ?>
                    <br>
                    Telepon: <?php echo gettoko('phone_contact') 
                    ?>
                </p>
            </center>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <h4 class="corporate-id"><?php echo $get['name_customer'] ?></h4>
                <p>
                    <strong><?php echo $get['address'] ?></strong><br>
                    <strong><?php echo $city ?> - <?php echo $prov ?></strong><br>
                    Telepon : <strong><?php echo $get['phone'] ?></strong><br> 
                    Email : <strong><?php echo $get['email'] ?></strong><br>

                    <?php 
                    if($get['courier']=="")
                    {
                        echo "";
                    }
                    else
                    { 
                    ?>
                        Kurir/Jenis : <strong><?php echo $get['courier'] ?>/<?php echo $get['packet'] ?></strong>
                        <br>
                    <?php 
                    }
                    
                    if($get['bank']=="cod")
                    {
                        echo "Pembayaran : <strong>".$pem."</strong>";
                    }
                    else
                    { 
                      $pay=$this->M__app->getdatapaymentId($get['payment_transaction'])->row_array()
                    ?>
                        Bank : <strong><?php echo $pay['name_bank'].' ['.$pay['number'].'] - [ '.$pay['name'].' ]'; ?></strong>
                    <?php 
                    }
                    ?>
                </p>
            </div>
            <div class="col-md-4">
                <div class="inv-col">
                    <span>No Invoice</span> 
                    <strong><?php echo $get['no_invoice'] ?></strong>
                </div>
                <div class="inv-col">
                    <span>Kode :</span> 
                    <strong><?php echo $get['kode_pembelian'] ?></strong>
                </div>
                <div class="inv-col">
                    <span>Tanggal :</span> 
                    <strong><?php echo substr($get['time_transaction'], 0,10) ?></strong>
                </div>
                <h1 class="t-due">TOTAL Rp.<?php echo uang($get['total_transaction']) ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="adv-table">
    <?php 
        $val       ="";
        $propinsi  =$get['province'];
        $kabupaten =$get['city'];
        $prov      =getProvinsi($propinsi);
        $city      =getKabupaten($kabupaten);
        $no        =0; 
        foreach ($details as $key)
        { 
        $no++;
            if ($key['state_discount']==1) 
            {
                $price=$key['discount_product'];
            }
            else
            {
                $price=$key['price_product'];
            }

            $total[]=$price*$key['qty_transaction'];
            $val.='<tr>
                <td>  '.$no.'</td>
                <td>  '.$key['name_product'].'</td>
                <td>  '.uang($price).' </td>
                <td>  '.$key['qty_transaction'].' </td>
                <td>  '.$key['information'].' </td>
                <td>  '.$key['weight_product']*$key['qty_transaction'].' gr </td>
                <td>Rp.'.uang($price*$key['qty_transaction']).'</td>
            </tr>';
        };
echo '<br>
        <center><h2><strong>Detail Pembelian</strong></h2></center>
        <hr>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Berat</th>
                <th>Total</th>
            </tr>
        ';
        echo $val."
            <tr>
                <td colspan='6'><center>Total</center></td>
                <td><strong>Rp.".uang(array_sum($total))."</strong></td>
            </tr>
        </table>" 
?>          
</div>