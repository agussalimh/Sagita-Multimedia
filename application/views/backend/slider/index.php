<div class="row xsResponse">
    <div class="col-sm-12">
        <?php echo form_open('delete_slider.aspx'); ?>
            <div class="row xsResponse">
                <div class="col-sm-4">
                    <div class="btn-group">
                        <a href="#" onclick="get_add()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Hapus</button>
                    </div>
                </div>
            </div>
            <br>
            <?php alert() ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Setting Slider</div>
                </div>
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>
                                    <center>
                                        <input type="checkbox" id="checkall" name="checkall">
                                    </center>
                                </th>
                                <th><center>Gambar</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++ ?>
                                <tr class="gradeX">
                                    <td align="center">
                                        <center>
                                            <input type="checkbox" value="<?php echo $row->id_slider;?>" name="id[]" ><input type="hidden" value="<?php echo $row->slider?>" name="picture[]">
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <img src="<?php echo base_url('uploads/'.$row->slider)?>" width="50%" alt="">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Gambar Slider</h4>
            </div>
            <?php echo form_open_multipart('add_slider.aspx'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Gambar</label>
                        <div class="col-sm-8">
                        <input type="file" required autocomplete="off" accept="image/jpeg,image/png" class="form-control" name="slider">
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
<script type="text/javascript">
    $(document).ready(function() {
        $("input[name=checkall]").click(function(){
    
        if(!$(this).is(':checked'))
            $(this).parents('table').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('input[type=checkbox]').attr('checked',true);
            
        });    
    });
    function get_add(){
        $("#add").modal("show");
    }
</script>