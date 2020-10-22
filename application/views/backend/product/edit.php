<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/backend/js/ios-switch/switchery.css" />
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Data Produk <?php echo $get['name_product'] ?></h4>
            </div>
            <?php echo form_open_multipart('update_product.aspx/'.$get['id_product'],'class="form-horizontal"'); ?>
                <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                    <div class="form-group">
                        <label class="col-sm-4">Nama Produk</label>
                        <div class="col-sm-8"><input type="text" required value="<?php echo $get['name_product'] ?>" placeholder="Masukkan Nama Produk" autocomplete="off" maxlength="30" class="form-control" name="product"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Keterangan Produk</label>
                        <div class="col-sm-8">
                            <textarea name="information" rows="5" placeholder="Masukkan Keterangan Produk" required class="form-control"><?php echo trim($get['information_product']) ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Slug/Url</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder="Masukkan Slug/Url" value="<?php echo $get['slug_product'] ?>" autocomplete="off" class="form-control" name="slug_edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Harga (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo uang($get['price_product']) ?>" onkeypress="return nomer(this)" onkeyup="return uang(this)" required placeholder="Masukkan Harga" autocomplete="off" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Gunakan Harga Diskon</label>
                        <div class="col-sm-6">
                            <div id="cEdit">
                                <input type="checkbox" id="editSel"
                                <?php
                                    if($get['state_discount']==1){ echo "checked";}
                                ?>
                                value="1" name="stateDiscountEdit" class="js-switch"/>
                            </div>
                        </div>
                    </div>
                    <div id="diskonEdit">
                        <div class="form-group">
                            <label class="col-sm-4">Harga Diskon (Rp.)</label>
                            <div class="col-sm-8">
                                <input type="text" onkeypress="return nomer(this)" onkeyup="return uang(this)" placeholder="Masukkan Harga Diskon" value="<?php echo uang($get['discount_product']) ?>" autocomplete="off" class="form-control" name="discountEdit">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Stok</label>
                        <div class="col-sm-8">
                            <div>
                                <div class="input-group" style="width:250px;">
                                    <input type="text" autocomplete="off" class="spinner-input form-control" maxlength="5" name="stock" onkeypress="return nomer(this)" value="<?php echo $get['stock_product']?>" required id="stockEdit">
                                    <div class="spinner-buttons input-group-btn">
                                        <button type="button" onclick="naik()" class="btn btn-primary spinner-up">
                                            <i class="fa fa-angle-up"></i>
                                        </button>
                                        <button type="button" onclick="kurang()" class="btn btn-primary spinner-down">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Berat (gram)</label>
                        <div class="col-sm-8">
                            <input type="text" onkeypress="return nomer(this)" value="<?php echo $get['weight_product'] ?>" required placeholder="Masukkan Berat Barang" autocomplete="off" class="form-control" name="weight">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Kategori</label>
                        <div class="col-sm-8">
                            <select name="category" required class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($category as $value => $row): ?>
                                    <option value="<?php echo $row->id_category ?>" <?php selected($row->id_category,$get['category_product']) ?>><?php echo $row->category ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Gambar Produk</label>
                        <div class="col-sm-8">
                            <img src="<?php echo base_url('uploads/'.$get['image_product']) ?>" width="185px" height="280px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Gambar Produk Baru (Opsional)</label>
                        <div class="col-sm-8">
                            <input type="file"  autocomplete="off" accept="image/jpeg,image/png" class="form-control" name="picture">
                        </div>
                        <br>
                        <span style="font-size: 12px;">
                            *) Ukuran optimal gambar adalah 285x380 pixel
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    var blue = document.querySelector('#editSel');
    var switchery = new Switchery(blue, { color: '#64bd63' });
    $("#update").modal("show");
    $("form").submit(function(){
        $('button').attr('disabled','disabled');
    });
    function naik()
    {
        var nilai=parseInt($('#stockEdit').val());
        if(nilai<99999){
            var nil=nilai+1;
            $('#stockEdit').val(nil);
        }
    }

    function kurang()
    {
        var nilai=parseInt($('#stockEdit').val());
        if(nilai!=0){
            var nil=nilai-1;
            $('#stockEdit').val(nil);
        }
    }
    $("[name='stateDiscountEdit']").click(function(){
        if(!$("[name='stateDiscountEdit']").is(':checked')){
              $("#diskonEdit").hide();
              $('[name="discountEdit"]').val("0");
        }else{
          $("#diskonEdit").show();
        }
    });
    <?php
    if($get['state_discount']==1)
    {
    ?>
        $("#cEdit > span > small").css('left','23px');
    <?php
    }
    else
    {
    ?>
        $("#diskonEdit").hide();
    <?php
    }
    ?>
</script>
