<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/backend/js/ios-switch/switchery.css" />
<div class="row">
    <div class="col-sm-12">
            <div class="panel-group " id="accordion">
                <div class="panel">
                    <div class="panel-heading accordion-toggle" style="cursor: pointer;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <h4 class="panel-title">
                            <a>
                                Filter Produk
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php include "filter-search.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php echo form_open('update_state_product.aspx'); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="btn-group">
                        <a href="javascript:void(0)" onclick="get_add()" class="btn btn-info">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                        <input type="submit" name="active" value="Aktifkan" class="btn btn-success">
                        <input type="submit" name="nonactive" value="Nonaktifkan" class="btn btn-danger">
                        <input type="submit" name="delete" value="Hapus Permanen" style="background-color: #d2322d;" class="btn btn-danger">
                    </div>
                </div>
            </div>
            <br>
            <div class="alert alert-success">
                <strong>Sukses!</strong> <span>Data Berhasil Di Temukan <b><?php echo $jumlah ?></b> Baris.</span>
                <button type="button" class="close close-sm" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Filter Produk</div>
                </div>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>
                                    <center>
                                        <input type="checkbox" id="checkall" name="checkall">
                                    </center>
                                </th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga(Rp.)</th>
                                <th>Diskon</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th style="width: 230px;"><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++ ?>
                                <tr class="gradeX">
                                    <td align="center">
                                        <center>
                                            <input type="checkbox" value="<?php echo $row->id_product;?>" name="id[]" >
                                        </center>
                                    </td>
                                    <td><?php echo $no+$off ?></td>
                                    <td><?php echo $row->name_product ?></td>
                                    <td>
                                        <?php
                                            if ($row->state_discount==1){
                                                echo uang($row->discount_product);
                                            }else{
                                                echo uang($row->price_product);
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($row->state_discount==1): ?>
                                            <label class="label label-primary">Ya</label>
                                        <?php else: ?>
                                            <label class="label label-warning">Tidak</label>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if($row->stock_product==0){
                                            $label="style='color:#d43f3a;'";
                                        }elseif($row->stock_product<5){
                                            $label="style='color:#f0ad4e;'";
                                        }else{
                                            $label="";
                                        }?>
                                        <label <?php echo $label ?>>
                                            <?php echo $row->stock_product ?>
                                        </label>
                                    </td>
                                    <td><?php echo $row->category ?></td>
                                    <td><?php echo get_state($row->state_product) ?></td>
                                    <td class="center hidden-phone">
                                        <a href="javascript:void(0)" onclick="get_update('<?php echo $row->id_product ?>')" class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i>
                                            <span class="hidden-xs">Edit</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="get_detail('<?php echo $row->id_product ?>')" class="btn btn-info btn-xs">
                                            <i class="fa fa-eye"></i>
                                            <span class="hidden-xs">Detail</span>
                                        </a>
                                        <a href="<?php echo site_url('picture_product.aspx/'.$row->id_product) ?>" class="btn btn-default btn-xs">
                                            <i class="fa fa-picture-o"></i>
                                            <span class="hidden-xs">Gambar</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div style="float: right;">
                        <?php echo $page ?>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Data Produk</h4>
            </div>
            <?php echo form_open_multipart('add_product.aspx','class="form-horizontal"'); ?>
                <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                    <div class="form-group">
                        <label class="col-sm-4">Nama Produk</label>
                        <div class="col-sm-8"><input type="text" required placeholder="Masukkan Nama Produk" autocomplete="off" maxlength="30" class="form-control" name="product"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Keterangan Produk</label>
                        <div class="col-sm-8">
                            <textarea name="information" rows="5" placeholder="Masukkan Keterangan Produk" required class="form-control">

                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Harga (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="text" onkeypress="return nomer(this)" onkeyup="return uang(this)" required placeholder="Masukkan Harga" autocomplete="off" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Gunakan Harga Diskon</label>
                        <div class="col-sm-8">
                            <div>
                                <input type="checkbox" value="1" name="stateDiscount" class="js-switch"/>
                            </div>
                        </div>
                    </div>
                    <div id="diskon">
                        <div class="form-group">
                            <label class="col-sm-4">Harga Diskon (Rp.)</label>
                            <div class="col-sm-8">
                                <input type="text" onkeypress="return nomer(this)" onkeyup="return uang(this)" placeholder="Masukkan Harga Diskon" autocomplete="off" class="form-control" name="discount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Stok</label>
                        <div class="col-sm-8">
                            <div class="spinner3">
                                <div class="input-group" style="width:250px;">
                                    <input type="text" onkeypress="return nomer(this)" class="spinner-input form-control" maxlength="5" name="stock" required>
                                    <div class="spinner-buttons input-group-btn">
                                        <button type="button" class="btn btn-primary spinner-up">
                                            <i class="fa fa-angle-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary spinner-down">
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
                            <input type="text" onkeypress="return nomer(this)" required placeholder="Masukkan Berat Barang" autocomplete="off" class="form-control" name="weight">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Kategori</label>
                        <div class="col-sm-8">
                            <select name="category" required class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($category as $value => $row): ?>
                                    <option value="<?php echo $row->id_category ?>"><?php echo $row->category ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Gambar Produk</label>
                        <div class="col-sm-8">
                            <input type="file" required  autocomplete="off" accept="images/jpeg,images/png" class="form-control" name="picture">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div id="edit"></div>
<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/fuelux/js/spinner.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/ios-switch/switchery.js" ></script>
<script src="<?php echo base_url()?>assets/backend/js/spinner-init.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/ios-switch/ios-init.js" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("input[name=checkall]").click(function(){
        if(!$(this).is(':checked'))
            $(this).parents('table').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('input[type=checkbox]').attr('checked',true);

        });
        $("[name='stateDiscount']").click(function(){
        if(!$("[name='stateDiscount']").is(':checked'))
          $("#diskon").hide();
        else
          $("#diskon").show();

        });

    });
    function get_add(){
        $("#add").modal("show");
    }
    function get_update(id){
        $.ajax({
            url:"<?php echo site_url('view_update_product.aspx'); ?>",
            type:"POST",
            cache:false,
            data:"id="+id,
            success:function(data){
                $("#edit").html(data);
            }
        });
    }
    function get_detail(id){
        $.ajax({
            url:"<?php echo site_url('view_detail_product.aspx'); ?>",
            type:"POST",
            cache:false,
            data:"id="+id,
            success:function(data){
                $("#edit").html(data);
            }
        });
    }
    $("#diskon").hide();
</script>
