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
<script src="<?php echo base_url()?>assets/backend/js/jquery.nicescroll.js"></script>
<br>
<div class="row">
    <div class="col-sm-12">
        <div>
            <center>
                <h2>
                    <b>Detail Pemesanan <?=$get['name_customer']?></b>
                </h2>
            </center>
            <span><b>Status Pemesanan :</b> <?php echo get_statetransaction($get['state']) ?></span>
            <?php 
            if ($get['state']==0): 
            ?>
                <br><br>
                <i style="font-size: 13px;">
                    Sudah Transfer? 
                    <a href="javascript:void(0)" style="color: #5bc0de" onclick="getModal()"> Klik Disini!</a> 
                    untuk mengupload bukti transfer anda.
                </i>    
                <script>
                    function getModal() {
                       $.ajax({
                            url:"<?php echo site_url('getValid.aspx'); ?>",
                            type:"POST",
                            cache:false,
                            data:"id="+"<?php echo $get['kode_pembelian']; ?>",
                            success:function(data){
                                $("#transfer").html(data);
                            }
                        });
                    }
                </script>
            <?php 
            endif;

            if (($get['state']!=0)): 
            ?>
                <br><br>
                <span>
                    <b>Bukti Transfer : </b>
                    <img src="<?php echo base_url('uploads/bukti/'.$get['bukti']); ?>" width="100px" height="100px">
                </span>
                <?php 
                if (($get['state']==1) || ($get['state']==2))
                { 
                } 
                else 
                { 
                ?>
                    <br><br>
                    <i style="font-size: 13px;">
                        Bukti Yang Di Upload Salah? 
                        <a href="javascript:void(0)" style="color: #5bc0de" onclick="getModal()"> Klik Disini!</a> 
                        untuk mengubah bukti transfer anda.
                    </i> 
                <?php 
                } 
                ?>
                <script>
                    function getModal() {
                       $.ajax({
                            url:"<?php echo site_url('getValidEdit.aspx'); ?>",
                            type:"POST",
                            cache:false,
                            data:"id="+"<?php echo $get['kode_pembelian']; ?>",
                            success:function(data){
                                $("#transfer").html(data);
                            }
                        });
                    }
                </script> 
            <?php 
            endif; 
            if (($get['state']==1) || ($get['state']==2)): 
            ?>
                <br><br>
                <span>
                    <b>No Resi :</b> <?php echo $get['no_resi'] ?>
                </span>
                <?php 
                if ($get['state']==1): 
                ?>
                    <br><br>
                    <i style="font-size: 13px;">
                        Barang Sudah Sampai? 
                        <a href="javascript:void(0)" onclick="window.location.href='<?php echo site_url('fix.aspx/'.$get['kode_pembelian']) ?>'" style="color: #5bc0de"> Klik Disini!</a> 
                        untuk mengkonfirmasinya.
                    </i>
                <?php 
                endif; 
            endif 
            ?>
            <br><br>
            <div>
                <div class="cartContent w100" style="overflow-x: auto;">
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
                                <td>  '.$key['weight_product']*$key['qty_transaction'].' gram </td>
                                <td>Rp.'.uang($price*$key['qty_transaction']).'</td>
                            </tr>';
                        };
                echo '<br>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Kode Pembelian</th>
                                <td>'.$get['kode_pembelian'].'</td>
                                <th>Alamat</th>
                                <td> '.$get['address'].'</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>'.$get['name_customer'].'</td>
                                <th>Kurir</th>
                                <td> '.$get['courier'].'</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td> '.$get['email'].'</td>
                                <th>Jenis</th>
                                <td> '.$get['packet'].'</td>
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
                                <th>Harga Ongkir</th>
                                <td>Rp. '.uang($get['price_ongkir']).'</td>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <center style="font-size:20px;">
                                        Total Transaksi : Rp.'.uang($get['total_transaction']).'
                                    </center>
                                </th>
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
                                <td><b>Rp. ".uang(array_sum($total))."</b></td>
                            </tr>
                        </table>" 
                    ?>          
                </div>
            </div>
        </div>
    </div>
</div>
<div id="transfer"></div>
<script>
    $(".cartContent").niceScroll({
        styler:"fb",
        cursorcolor:"#e74c3c",
        cursorwidth: '6', 
        cursorborderradius: '5px', 
        background: '#fff', 
        spacebarenabled:false, 
        autohidemode:false, 
        cursorborder: '1',  
        zindex: '1000'
    });
</script>