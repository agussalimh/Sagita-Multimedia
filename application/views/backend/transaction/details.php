<?php 
if($get['bank']=='cod')
{
    $pem='COD';
}
else
{
    $pem=$pay['name_bank'].' ['.$pay['number'].'] - [ '.$pay['name'].']';
}
?>
<div class="row">
    <div class="col-sm-12">
        <br>
        <?php alert() ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Detail Transaksi <?=$get['name_customer']?></div>
            </div>
            <div class="panel-body">
                <div style="float: right;">
                    <a class="btn btn-info btnPrint" href="<?php echo site_url('print.aspx/'.$get['id_transaction']) ?>">
                        <i class="fa fa-print"></i> Cetak Invoice
                    </a>
                </div>
                <span>Status Pemesanan : <?php echo get_statetransaction($get['state']) ?></span>

                <?php 
                if ($get['state']!=0 && $get['bank']!='cod'): 
                ?>
                    <br><br>
                    <span>
                        Bukti Transfer : 
                        <img src="<?php echo base_url('uploads/bukti/'.$get['bukti']); ?>" width="100px" height="100px">
                    </span>
                <?php 
                endif 
                ?>

                <div class="adv-table">
                    <?php 
                    if (($get['state']==1) || ($get['state']==2))
                    { 
                    } 
                    else 
                    { 
                    ?>
                        <br>
                        <span style="float: right;">
                          <button onclick="send()" class="btn btn-primary">
                            Kirim Pesanan
                          </button>
                          <br><br>
                        </span> 
                    <?php 
                    } 
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
                            <td>  '.$key['weight_product']*$key['qty_transaction'].' gram </td>
                            <td>Rp.'.uang($price*$key['qty_transaction']).'</td>
                        </tr>';
                    }
                echo '<br>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="4">
                                    <center>No Invoice : '.$get["no_invoice"].'</center>
                                </th>
                            </tr>
                            <tr>
                                <th>Kode Pembelian</th>
                                <td>'.$get['kode_pembelian'].'</td>
                                <th>Alamat</th>
                                <td> '.$get['address'].'</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>'.$get['name_customer'].'</td>
                                <th>Email</th>
                                <td> '.$get['email'].'</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>'.$prov.'</td>
                                <th>Waktu</th>
                                <td> '.$get['time_transaction'].'</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td> '.$city.'</td>
                                <th>Pembayaran</th>
                                <td>'.$pem.'</td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>Rp. '.uang(array_sum($total)).'</td>
                                <th>Total Transaksi</th>
                                <td>Rp.'.uang($get['total_transaction']).'</td>
                            </tr>
                        </table>
                        <br>
                        <center><h2><b>Detail Pembelian</b></h2></center>
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
                                <td><b>Rp.".uang(array_sum($total))."</b></td>
                            </tr>
                        </table>" 
                    ?>          
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
if (($get['state']!=0) || ($get['state']!=4)): 
    if ($get['state']!=1): 
?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalSend" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Kirim Pesanan Pelanggan</h3>
                    </div>

                    <?php 
                    echo form_open('send.aspx','class="form-horizontal"'); 
                    echo form_hidden('id', $get['id_transaction']); 
                    ?>
                    
                    <div class="modal-body">
                        <center>
                            Yakin akan mengirim pesanan ke pelanggan?
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Tutup
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <script>
            function send(argument) 
            {
                $("#modalSend").modal("show");
            }
        </script> 
<?php 
    endif; 
endif 
?>

<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url('assets/backend/print/jquery.printPage.js'); ?>"></script>

<script>
    $(".btnPrint").printPage();
</script>