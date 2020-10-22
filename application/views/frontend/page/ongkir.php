<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<div class="container main-container">
    <div class="morePost row featuredPostContainer style2">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <center><h1 class="title-big text-center section-title-style2"><span>CEK ONGKIR</span></h1></center>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h3 class="panel-title">Asal</h3>
                          </div>
                          <div class="panel-body">
                            <select class="form-control" style="width: 100%;" required name="propinsi_asal" id="propinsi_asal">
                                <option value="" selected="" disabled="">Pilih Provinsi</option>
                                <?php $this->load->view('frontend/page/rajaongkir/getProvince'); ?>
                            </select>
                            <br><br>
                            <select class="form-control" style="width: 100%;" required name="origin" id="origin">
                                <option value="" selected="" disabled="">Pilih Kota</option>
                            </select>
                          </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Tujuan</h3>
                          </div>
                          <div class="panel-body">
                            <select class="form-control" style="width: 100%;" name="propinsi_tujuan" required id="propinsi_tujuan">
                                <option value="" selected="" disabled="">Pilih Provinsi</option>
                                <?php $this->load->view('frontend/page/rajaongkir/getProvince'); ?>
                            </select>
                            <br><br>
                            <select class="form-control" style="width: 100%;" required name="destination" id="destination">
                                <option value="" selected="" disabled="">Pilih Kota</option>
                            </select>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Berat</h3>
                          </div>
                          <div class="panel-body">
                            <input type="text" name="berat" placeholder="gram" id="berat" class="form-control">
                            <br>
                            <select class="form-control" style="width: 100%;" name="courier" required id="courier">
                                <option value="">Pilih Kurir</option>
                                <?php 
                                $val=array(); 
                                if(gettoko('pos')==1)
                                {
                                   $val[]='<option value="pos">POS</option>';
                                }

                                if(gettoko('jne')==1)
                                {
                                   $val[]='<option value="jne">JNE</option>';
                                } 
                                if(gettoko('tiki')==1)
                                {
                                   $val[]='<option value="tiki">TIKI</option>';
                                } 
                                echo implode("", $val) 
                                ?>
                            </select>
                            <br><br>
                            <button type="button" onclick="tampil_data('data')" class="btn btn-info">Cek Ongkir</button>
                          </div>
                        </div>

                        <script>
                            function tampil_data(act){
                                  var w = $('#origin').val();
                                  var x = $('#destination').val();
                                  var y = $('#berat').val();
                                  var z = $('#courier').val();
                                  if(w=="" || x=="" || y=="" || z=="")
                                  {
                                    alert("Data belum lengkap");
                                  }
                                  else
                                  {
                                    $("#hasil").html("Memuat...");
                                    $.ajax({
                                        url: "<?php echo site_url('costfirst.aspx') ?>",
                                        type: "GET",
                                        data : {origin: w, destination: x, berat: y, courier: z},
                                        success: function (ajaxData){
                                            $("#hasil").html(ajaxData);
                                        }
                                    });
                                  }
                              };
                        </script>

                    </div>

                    <div class="col-md-8">
                        <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Hasil</h3>
                          </div>
                          <div class="panel-body">
                            <ol>
                                <div id="hasil">
                                    
                                </div>
                            </ol>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
    $(document).ready(function(){
      
        $("#propinsi_asal").change(function(){
          var propinsi=$('#propinsi_asal').val();
          $('#origin').html("<option value=''>Memuat...</option>");
          $.ajax({
              url:"<?php echo site_url('getcity.aspx')?>",
              type:"POST",
              cache:false,
              data:"propinsi="+propinsi,
              success:function(data){
                $('#origin').html(data);
              }
          });
        });

        $("#propinsi_tujuan").change(function(){
          var propinsi=$('#propinsi_tujuan').val();
          $('#destination').html("<option value=''>Memuat...</option>");
          $.ajax({
              url:"<?php echo site_url('getcity.aspx')?>",
              type:"POST",
              cache:false,
              data:"propinsi="+propinsi,
              success:function(data){
                $('#destination').html(data);
              }
          });
        });
    });
</script>