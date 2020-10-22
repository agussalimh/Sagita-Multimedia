<div class="container main-container">
    <div class="morePost row featuredPostContainer style2">
        <?php alert() ?>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <center>
                        <h1 class="title-big text-center section-title-style2">
                            <span>TESTIMONI PELANGGAN</span>
                        </h1>
                    </center>
                    <hr>
                    <div class="col-lg-8 graybg">
                        <div class="all-review-wrapper wow fadeIn">
                            <?php foreach ($testimony as $row): ?>
                            <div class="row review-item">
                                <div class="col-lg-3 col-sm-3  left">
                                    <div class="review-item-user">
                                        <div class="user-name">
                                            <p><b><?php echo $row->name ?></b></p>
                                            <small class="label label-primary"><?php echo $row->time ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9  col-sm-9 right">
                                    <p class="commentText">
                                        <?php echo $row->testimony ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <?php endforeach ?>
                        </div>
                        <div class="more">
                          <?php if ($num>10): ?>

                            <input type="hidden" id="offset" value="10">
                            <center style='font-size:12px;'>
                                <a onclick="moreTestimoni()" href="javascript:void(0)" class="btn btn-info">
                                    <i>Muat selanjutnya...</i>
                                </a>
                            </center>
                            
                          <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Kirimkan Testimoni Anda
                            </div>
                            <?php echo form_open('submitTestimony.aspx', 'class="form-horizontal"'); ?>
                            <div class="panel-body">
                                <div class="form-group required">
                                    <label class="col-md-4">Nama<sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" required placeholder="Masukkan nama anda" autocomplete="off" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-md-4">Email<sup>*</sup></label>
                                    <div class="col-md-8">
                                        <input type="email" required placeholder="Masukkan alamat email anda" autocomplete="off" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-md-4">Testimoni<sup>*</sup></label>
                                    <div class="col-md-8">
                                        <textarea name="testimony" required placeholder="Masukkan testimoni anda" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-primary btn-md" type="submit">
                                    <i class="fa fa-send"></i>
                                    Kirim Testimoni
                                </button>  
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
    function moreTestimoni() {
       var batas=$("#offset").val();
       $.ajax({
         url:"<?=site_url('moreTestimony.aspx')?>",
         type:"POST",
         cache:false,
         data:{"offset":batas},
         success:function(data){
          $(".more").html(data);
         }
       });
   }
</script>