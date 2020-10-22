<div class="row">
    <?php alert() ?>
    <div class="col-sm-6">
        <?php echo form_open('delete_options.aspx'); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="btn-group">
                        <a href="#" onclick="get_add('1')" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                        <input type="submit" name="nonactive" value="Hapus" class="btn btn-danger btn-sm">
                    </div>
                </div>
            </div>
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Gratis Ongkir</div>
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
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 

                            $no=0; foreach($get as $row): $no++;
                            if($provinsi[$row->id_provinsi]!="")
                            {
                            ?>
                                <tr class="gradeX">
                                    <td align="center">
                                        <center>
                                            <input type="checkbox" value="<?php echo $row->id;?>" name="id[]" >
                                        </center>
                                    </td>
                                    <td><?php echo $provinsi[$row->id_provinsi] ?></td>
                                    <td><?php echo $kabupaten[$row->id_kab] ?></td>
                                </tr>
                            <?php 
                            }
                            endforeach; 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo form_open('delete_options.aspx'); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="btn-group">
                        <a href="#" onclick="get_add('2')" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                        <input type="submit" name="nonactive" value="Hapus" class="btn btn-danger btn-sm">
                    </div>
                </div>
            </div>
            <br>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="panel-title">COD Kabupaten</div>
                </div>
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table2">
                            <thead>
                            <tr>
                                <th>
                                    <center>
                                        <input type="checkbox" id="checkall2" name="checkall2">
                                    </center>
                                </th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($gett as $r): $no++ ?>
                                <tr class="gradeX">
                                    <td align="center">
                                        <center>
                                            <input type="checkbox" value="<?php echo $r->id;?>" name="id[]" >
                                        </center>
                                    </td>
                                    <td><?php echo getProvinsi($row->id_provinsi) ?></td>
                                    <td><?php echo getKabupaten($row->id_kab) ?></td>
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
                <h4 class="modal-title"></h4>
            </div>
            <?php echo form_open_multipart('update_setting_tambahan.aspx','class="form-horizontal"'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Provinsi</label>
                        <div class="col-sm-8">
                            <select class="form-control" style="width: 100%;" required name="propinsi" id="propinsi_asal">
                                <option value="" selected="" disabled="">Pilih Provinsi</option>
                                <?php foreach ($provinsi as $key => $value): ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Kabupaten</label>
                        <div class="col-sm-8">
                            <select class="form-control" style="width: 100%;" required name="kabupaten" id="origin">
                                <option value="" selected="" disabled="">Pilih Kota</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="jenis" value="" name="jenis">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("input[name=checkall]").click(function(){
    
        if(!$(this).is(':checked'))
            $(this).parents('table').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('input[type=checkbox]').attr('checked',true);
            
        });    

        $("input[name=checkall2]").click(function(){
    
        if(!$(this).is(':checked'))
            $(this).parents('table').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('input[type=checkbox]').attr('checked',true);
            
        });    

        $("#propinsi_asal").change(function(){
          var propinsi=$('#propinsi_asal').val();
          $('#origin').html("Memuat...");
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

    });

    function get_add(jenis) 
    {

        if(jenis==1)
        {
            $(".modal-title").html('Tambah Data Kabupaten Gratis Ongkir');
        }
        else
        {
            $(".modal-title").html('Tambah Data Kabupaten Cod');
        }
        $("#add").modal("show");
        $("#jenis").val(jenis);
    }
</script>