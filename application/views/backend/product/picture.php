<link href="<?php echo base_url()?>assets/backend/js/dropzone/css/dropzone.css" rel="stylesheet"/>
<div class="row">
    <div class="col-sm-12">
        <?php echo form_open('delete_image_product.aspx'); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="btn-group">
                        <a href="javascript:void(0)" onclick="get_add()" class="btn btn-info">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                        <button type="submit" name="nonactive" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <?php alert() ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Galeri Produk <?php echo $get['name_product'] ?></div>
                </div>
                <div class="panel-body">
                    <input type="hidden" value="<?php echo $get['id_product'] ?>" name="id_product">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped table-responsive" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>
                                    <center>
                                        <input type="checkbox" id="checkall" name="checkall">
                                    </center>
                                </th>
                                <th>
                                    <center>Gambar Pendukung</center>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++ ?>
                                <tr class="gradeX">
                                    <td align="center">
                                        <center><input type="checkbox" value="<?php echo $row->id_image_product;?>" name="id[]">
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <img src="<?php echo base_url('uploads/'.$row->image) ?>" width="185px" height="260px;">
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add" class="modal fade">
    <div class="modal-dialog" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Gambar Pendukung <?php echo $get['name_product'] ?></h4>
            </div>
            <div class="modal-body" style="height: 450px;">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="dropzone" style="cursor: pointer; height: 400px;">
                            <div class="dz-message">
                                <center>
                                    <h4>
                                        Klik atau drop gambar disini
                                    </h4>
                                </center>
                            </div>
                        </div>
                         <span style="font-size: 12px;">
                            *) Ukuran optimal gambar adalah 285x380 pixel
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="location.reload()" class="btn btn-primary">Refresh</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/dropzone/dropzone.js"></script>
<script type="text/javascript">
    $("input[name=checkall]").click(function(){
    if(!$(this).is(':checked'))
        $(this).parents('table').find('input[type=checkbox]').attr('checked',false);
    else
        $(this).parents('table').find('input[type=checkbox]').attr('checked',true);
        
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
    Dropzone.autoDiscover = false;
    var gambar=new Dropzone(".dropzone",{
        url:"<?php echo site_url('upload_product.aspx/'.$get['id_product'])?>",
        maxFilesize:10,
        method:"POST",
        acceptedFiles:"image/*",
        paramName:"userfile",
        dictInvalidFileType:"Tipe file ini tidak di izinkan",
        addRemoveLinks:"true"
    });
    gambar.on("sending",function(a,b,c){
        a.token=Math.random();
        c.append("token_gambar",a.token);
    });
    gambar.on("removedfile",function(a){
        var token=a.token;
        $.ajax({
            url:"<?php echo site_url('delete_picture.aspx'); ?>",
            type:"POST",
            cache:false,
            data:{"token":token},
            dataType:"json",
            success:function(data){
                
            }
        });
    });
</script>