<div class="container main-container">
    <div class="morePost row featuredPostContainer style2">
        <div class="col-lg-12">
            <center><h1 class="title-big text-center section-title-style2"><span>DAFTAR HARGA</span></h1></center>
            <hr>
        </div>
        <div class="container">
            <div class="row xsResponse">
                   <table class="table table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr class="CartProduct cartTableHeader">
                                <th style="width:15%">Produk</th>
                                <th style="width:40%">Nama</th>
                                <th style="width:10%">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($all as $row): $no++ ?>
                            <tr>
                                <td style="vertical-align: middle;">
                                    <center>
                                        <a href="javascript:void(0)">
                                            <img src="<?php echo base_url('uploads/'.$row->image_product) ?>" alt="img" style="width:100px;height:130px;"
                                            class="wow pulse" data-wow-duration="2s" data-wow-delay="0">
                                        </a>
                                    </center>
                                </td>
                                <td style="vertical-align: middle;">
                                    <center>
                                        <h4><a href="<?php echo site_url('product-details.aspx/'.$row->id_product);?>"> <?php echo $row->name_product?> </a></h4>
                                    </center>
                                </td style="vertical-align: middle;">
                                <td style="vertical-align: middle;"><center>Rp.<?php echo uang($row->price_product) ?></center></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <hr>   
                <center><?php echo $page; ?></center>
            </div>
        </div>
    </div>
</div>

<script>
    $("img").click(function(event){
        var src=$(this).attr('src');
        $("#modalPict").modal("show");
        $("#modalPictBody").html("<center><img src='"+src+"' style='width:280px;height:380px;'></center>");
    });
</script>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalPict" class="modal signUpContent fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <center id="modalPictBody"></center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>assets/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>