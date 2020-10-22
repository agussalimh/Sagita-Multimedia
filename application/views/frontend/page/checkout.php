<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<form action="<?php echo site_url('fixed.aspx')?>" method="post" id="formLang">
    <div class="container main-container">
        <div class="morePost row featuredPostContainer style2 ">
            <?php alert() ?>
            <div class="container">
                <?php
                    $jumlah =array();
                    $berat  =array();
                    foreach ($this->cart->contents() as $items):
                        $jumlah[] =$items['price'];
                        $berat[]  =$items['berat'];
                    endforeach; 
                    if(array_sum($jumlah)==0)
                    { 
                        redirect();
                    }
                ?>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               <h3 class="section-title-inner">
                                    <span><i class="fa fa-money"></i> Lakukan Pemesanan</span>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row userInfo">
                                    <div class="col-xs-12 col-sm-12">
                                        <center><h4>BIODATA DIRI</h4></center>
                                        <hr>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group required">
                                                <label for="InputName">Nama <sup>*</sup> </label>
                                                <input 
                                                required 
                                                type="text" 
                                                name="name" 
                                                maxlength="200" 
                                                class="form-control" 
                                                id="InputName"
                                                placeholder="Masukkan nama"
                                                autocompler="off">
                                            </div>
                                            <div class="form-group required">
                                                <label for="InputEmail">Email <sup>*</sup></label>
                                                <input 
                                                type="email" 
                                                maxlength="200" 
                                                class="form-control" 
                                                name="email" 
                                                id="InputEmail" 
                                                placeholder="Masukkan email"
                                                autocomplete="off">
                                            </div>
                                            <div class="form-group required">
                                                <label for="InputName">Nomor Handphone/Telepon <sup>*</sup> </label>
                                                <input 
                                                required 
                                                type="text" 
                                                name="phone" 
                                                maxlength="20" 
                                                onkeypress="return nomer(this)" 
                                                class="form-control" 
                                                id="InputName"
                                                placeholder="Masukkan nomor handphone/telepon"
                                                autocomplete="off">
                                            </div>
                                            <div class="form-group required">
                                                <label for="InputAddress">Provinsi <sup>*</sup> </label>
                                                <select 
                                                class="form-control" 
                                                required 
                                                onchange="res_data('data')" 
                                                name="propinsi_tujuan" 
                                                id="propinsi_tujuan">
                                                    <option value="">Pilih Provinsi</option>
                                                    <?php 
                                                        $this->load->view('frontend/page/rajaongkir/getProvince'); 
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label for="InputAddress" >Kabupaten <sup>*</sup> </label>
                                                <select 
                                                class="form-control" 
                                                required 
                                                onchange="res_data('data')" 
                                                name="destination" 
                                                id="destination">
                                                    <option value="">Pilih Kabupaten</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group required" style="height: 216px;">
                                                <label for="InputAddress">Alamat Lengkap <sup>*</sup> </label>
                                                <textarea 
                                                rows="8" 
                                                name="alamat" 
                                                class="form-control" 
                                                id="InputAddress"
                                                required
                                                placeholder="Masukkan alamat lengkap (kecamatan, desa, kode pos, jalan)"
                                                autocomplete="off"></textarea>
                                            </div>
                                            <div id="pay">
                                                <div class="form-group">
                                                    <label id="bayar" for="InputAdditionalInformation">Bank<sup>*</sup></label>
                                                    <select 
                                                    name="bank" 
                                                    id="bnk" 
                                                    class="form-control">
                                                       <option value="">
                                                        Silahkan Memilih
                                                       </option>
                                                       <?php $no=0; foreach($bank as $row): $no++ ?>

                                                            <option value="<?php echo $row->id_payment ?>">
                                                            <?php 
                                                            echo $row->name_bank 
                                                            ?>/<?php 
                                                            echo $row->name 
                                                            ?>/<?php 
                                                            echo $row->number 
                                                            ?>
                                                            </option>

                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group required" id="kurir">
                                                <label for="InputAdditionalInformation">Pilih Kurir <sup>*</sup></label>
                                                <select required onchange="tampil_data('data')" class="form-control" name="courier" id="courier">
                                                    <option value="">Pilih Kurir</option>
                                                    <?php 
                                                    if(gettoko('pos')==1)
                                                    {
                                                       $val[]='<option value="pos">POS</option>';
                                                    } 
                                                    ?>
                                                    <?php 
                                                    if(gettoko('jne')==1)
                                                    {
                                                       $val[]='<option value="jne">JNE</option>';
                                                    } 
                                                    ?>
                                                    <?php 
                                                    if(gettoko('tiki')==1)
                                                    {
                                                       $val[]='<option value="tiki">TIKI</option>';
                                                    } 
                                                    
                                                    echo implode("", $val) 

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="width: 100%;overflow-x: scroll;">
                                    <br><br>
                                    <center>
                                        <h4>DATA PENGIRIMAN/KURIR</h4>
                                        <hr>
                                    </center>
                                    <script>
                                        function tampil_data(act)
                                        {
                                              var a = $('#propinsi_tujuan').val();
                                              var x = $('#destination').val();
                                              var y = '<?php echo array_sum($berat) ?>';
                                              var z = $('#courier').val();
                                              if(x=="" && a=="")
                                              {
                                                alert("Lengkapi tujuan anda");
                                              }
                                              else if(x==null && a==null)
                                              {
                                                alert("Lengkapi tujuan anda");
                                              }
                                              else
                                              {
                                                  $("#hasil").html("<center>Memuat.....</center>");
                                                  $("#pesan").attr("disabled",true);
                                                  $.ajax({
                                                      url  : "<?php echo site_url('cost.aspx') ?>",
                                                      type : "GET",
                                                      data : {destination: x, berat: y, courier: z},
                                                      success: function (ajaxData){
                                                          $("#hasil").html(ajaxData);
                                                          $("#pesan").attr("disabled",false);
                                                      }
                                                  });
                                              }
                                              
                                          }

                                          function res_data(data)
                                          {
                                            $('#bnk option[value="cod"]').remove();
                                            var kurir=$('#courier').val();
                                            var kota=$('[name="destination"]').val();
                                            var kab=[];
                                            <?php
                                                $free=getoption(1);
                                                foreach ($free as $key):
                                            ?>
                                                kab.push('<?php echo $key->id_kab?>');
                                            <?php
                                                endforeach;
                                            ?>
                                            
                                            if(kurir!="")
                                            {
                                                $('#total_ongkir').html("");
                                                if(kab.length>0)
                                                {
                                                    if($.inArray( kota, kab)!= -1)
                                                    {
                                                        $("#hasil").html("");
                                                    }
                                                    else
                                                    {
                                                        tampil_data();
                                                    }
                                                }
                                                else
                                                {
                                                    tampil_data();
                                                }
                                            }

                                            $("#kurir").show();
                                            $("#total_ongkir").html('');
                                            $("#bayar").html('Bank<sup>*</sup>');

                                            if(kab.length>0)
                                            {
                                                if($.inArray( kota, kab) != -1)
                                                {
                                                    $("#kurir").hide();
                                                    $("#kurir").val("");
                                                    $("#total_ongkir").html('<?php echo uang(array_sum($jumlah)) ?>');
                                                }
                                            }

                                            var ongkir=[];
                                            <?php
                                                $ong=getoption(2);
                                                foreach ($ong as $k):
                                            ?>
                                                ongkir.push('<?php echo $k->id_kab?>');
                                            <?php
                                                endforeach;
                                            ?>

                                            if(ongkir.length>0)
                                            {
                                                if($.inArray( kota, ongkir) != -1)
                                                {
                                                    $("#bnk").append('<option id="cod" value="cod">COD</option>');
                                                    $("#bayar").html('Pembayaran<sup>*</sup>');
                                                }
                                            }
                                          }
                                    </script>
                                    <div id="hasil"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 rightSidebar">
                        <div class="contentBox">
                            <div class="w100 costDetails">
                                <div class="table-block" id="order-detail-content">
                                    <table id="cart-summary" class="std table">
                                        <tbody>
                                            <tr class="CartProduct">
                                                <td><h4>TOTAL BERAT</h4></td>
                                                <td class="price"><?php echo array_sum($berat) ?> gram</td>
                                            </tr>
                                            <tr class="CartProduct">
                                                <td><h4>TOTAL HARGA PRODUK</h4></td>
                                                <td class="price">Rp.<?php echo uang(array_sum($jumlah)) ?></td>
                                            </tr>
                                            <tr class="CartProduct">
                                                <td><h4>TOTAL HARGA + ONGKIR</h4></td>
                                                <td class="price"><div id="total_ongkir"></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="w100 cartMiniTable">
                                <br>
                                <button id="pesan" onclick="kirim()" type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px"> Lakukan Pemesanan &nbsp;
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</form>

<script>

    $(document).ready(function(){
        $("#propinsi_tujuan").change(function(){
         var propinsi=$('#propinsi_tujuan').val();
         $('#destination').html("<option value=''>Memuat...</option>");
            $.ajax({
                url   :"<?php echo site_url('getcity.aspx')?>",
                type  :"POST",
                cache :false,
                data  :"propinsi="+propinsi,
                success:function(data)
                {
                     $('#destination').html(data);
                }
            });

        });

    });

    function total_asli(ongkir)
    {
        $('#total_ongkir').html("Mohon tunggu...");
        var total='<?php echo array_sum($jumlah) ?>';
        $.ajax({
            url   :"<?php echo site_url('total.aspx')?>",
            type  :"POST",
            cache :false,
            data  :{
                    "total"  :total,
                    "ongkir" :ongkir
            },
            success:function(data)
            {
                 $('#total_ongkir').html(data);
            }
        });
    }

    function nomer(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }

    function kirim() 
    {
        $('#formLang').submit()
        $("button").attr('disable', 'disable');
    }
</script>
