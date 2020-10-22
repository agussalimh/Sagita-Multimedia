<div class="container main-container">
    <div class="morePost row featuredPostContainer style2">
        <?php alert() ?>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <h1 class="title-big text-center section-title-style2">
                                <span>CEK PESANAN</span>
                            </h1>
                        </center>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" id="kode" name="kode" required autocomplete="off" class="form-control" placeholder="Kode Pembelian Anda">
                            <div class='input-group-btn'>
                                <button class="btn btn-primary" onclick="getTransaction()"> Cek Pesanan</button>
                            </div>
                        </div>
                        <br>
                        <center id="error"></center>
                    </div>
                </div>
                <div class="row" id="detailPesanan"></div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
    function nomer(evt)
    {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
      return true;
    }

    function getTransaction() {
        var kode = $("#kode").val();
        if(kode=="")
        {
            $("#error").html('<span style="color:red;">Kode Pembelian Wajib Di Isi</span>');
        }
        else
        {
            $("#error").html('');
            $("#detailPesanan").html("<center><br>Memuat....</center>");
            $.ajax({
            url: '<?php echo site_url('getOrder.aspx') ?>',
            type: 'POST',
            data: {'id': kode,},
            success:function(data){
              if(data=="0")
              {
                $.gritter.add({
                    title: "Error!",
                    text: "Data pemesanan tidak dapat ditemukan!",
                    sticky: false,
                    time: 6200
                });
                $("#detailPesanan").html("");
              }
              else
              {
                $("#detailPesanan").html(data);
              }
            }
          })
        }
    }
</script>