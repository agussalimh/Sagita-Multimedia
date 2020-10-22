<script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/fuelux/js/spinner.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/spinner-init.js"></script>
<div class="modal signUpContent fade" id="ModalCart" style="margin-left: auto;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body form-horizontal">
                <center>
                  <h4>
                    <b>
                      Produk : <?php echo $get['name_product']?><br>(
                      <?php if ($get['state_discount']==1) { ?>
                          <span class="price-sales" style="color: #e74c3c;">
                              Rp.<?php echo uang($get['discount_product']) ?>
                          </span>
                      <?php }else{ ?>
                          <span class="price-sales" style="color: #e74c3c;">
                              Rp.<?php echo uang($get['price_product']) ?>
                          </span>
                      <?php } ?>
                      <?php if ($get['state_discount']==1) { ?>
                          <span class="price-standard">
                              Rp.<?php echo uang($get['price_product']) ?>
                          </span>
                      <?php } ?>
                      )
                    </b>
                  </h4>
                </center>
                <hr>
                <?php 
                  $cart=in_cart($id);
                  if($cart){
                    $q=$cart['qty'];
                    $realStok=$get['stock_product']-$q;
                  }else{
                    $q=0;
                    $realStok=$get['stock_product'];
                  }
                ?>
                <div class="form-group">
                  <label class="col-md-4">Stok Tersedia</label>
                  <div class="col-md-8">
                       <b><?php echo $get['stock_product']-$q ?> Item</b>
                  </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4">Jumlah</label>
                   <div class="col-md-8">
                       <div class="spinner3" id="sp">
                            <div class="input-group" style="width:100%;">
                                <input type="text" autocomplete="off" onkeypress="return nomer(this)" class="spinner-input form-control" maxlength="5" onkeyup="valid_max()" name="qty" id="qty" required>
                                <div class="spinner-buttons input-group-btn">
                                    <button type="button" onclick="valid_max()" class="btn btn-primary spinner-up">
                                        <i class="fa fa-angle-up"></i>
                                    </button>
                                    <button type="button" onclick="valid_max()" class="btn btn-primary spinner-down">
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-4">Keterangan (Optional)</label>
                   <div class="col-md-8">
                       <textarea name="information" id="information" class="form-control" placeholder="Masukkan keterangan contoh: rasa, ukuran, warna dll" rows="5"></textarea>
                       
                   </div>
                </div>
                <input type="hidden" value="<?php echo $id ?>" name="id">
            </div>
            <div class="modal-footer">
                <button id="batal" class="btn btn-default" data-dismiss="modal">
                  <i class="glyphicon glyphicon-remove-sign"></i> Batal
                </button>
                <button id="lanjut" class="btn btn-primary" type="button" onclick="cart()">
                  <i class="glyphicon glyphicon-shopping-cart"></i> Lanjutkan
                </button>
            </div>
        </div>
    </div>
</div>
<script>
  function valid_max(){
    var val=$("#sp > div > input").val();
    var max=parseInt("<?php echo $realStok ?>");
    if(val>max){
      $("#sp > div > input").val(max);
    }
  }
  function cart()
  {
    if($("#lanjut").attr('disabled'))
    {

    }
    else
    {
      $("#qty").attr('disabled','disabled');
      $("#information").attr('disabled','disabled');
      $("#lanjut").attr('disabled','disabled');
      $("#batal").attr('disabled','disabled');
      var jumlah=$("[name='qty']").val();
      var keterangan=$("[name='information']").val();
      $("#loading").addClass('bore');
      $.ajax({
        url: '<?php echo site_url('tocart.aspx') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
            'information': keterangan,
            'qty': jumlah,
            'id': '<?php echo $get["id_product"] ?>',
        },
        success:function(data){
          $("#loading").removeClass('bore');
          if(data.error=="1")
          {
            $.gritter.add({
                title: data.title,
                text: data.message,
                sticky: false,
                time: 6200
            });
            $("#lanjut").removeAttr('disabled');
            $("#batal").removeAttr('disabled');
            $("#qty").removeAttr('disabled');
            $("#information").removeAttr('disabled');
          }
          else
          {
            $("#ModalCart").modal("hide");
            cartSmall();
            cartBig();
            cartReal();
            $.gritter.add({
                title: "Sukses!",
                text: "Data berhasil di tambahkan ke keranjang",
                sticky: false,
                time: 6200
            });
          }
        }
      })
    }
  }
  function nomer(evt)
  {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
      return true;
  }
</script>