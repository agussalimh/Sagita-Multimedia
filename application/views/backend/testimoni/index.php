<div class="row">
    <div class="col-sm-12">
        <?php echo form_open('update_state_testimoni.aspx'); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="btn-group">
                        <input type="submit" name="active" value="Aktifkan" class="btn btn-success">
                        <input type="submit" name="pending" value="Pending" class="btn btn-warning">
                        <input type="submit" name="nonactive" value="Hapus" class="btn btn-danger">
                    </div>
                </div>
            </div>
            <br>
            <?php alert() ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Testimoni</div>
                </div>
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    <center>
                                        <input type="checkbox" id="checkall" name="checkall">
                                    </center>
                                </th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++ ?>
                                <tr class="gradeX">
                                    <td><?php echo $no ?></td>
                                    <td align="center">
                                        <center>
                                            <input type="checkbox" value="<?php echo $row->id_testimony;?>" name="id[]" >
                                        </center>
                                    </td>
                                    <td><?php echo $row->name ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->time ?></td>
                                    <td>
                                        <?php 
                                        if($row->state=="1"){
                                            echo "<label class='label label-success'>Aktif</label>";
                                        }elseif($row->state=="2"){
                                            echo "<label class='label label-warning'>Pending</label>";
                                        }else{
                                            echo "<label class='label label-danger'>Nonaktif</label>";
                                        } ?>
                                    </td>
                                    <td class="center hidden-phone">
                                        <a href="javascrip:void(0)" onclick="get_update('<?php echo $row->id_testimony ?>')" class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i> 
                                            <span class="hidden-xs">Edit</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="get_detail('<?php echo $row->id_testimony ?>')" class="btn btn-info btn-xs">
                                            <i class="fa fa-eye"></i> 
                                            <span class="hidden-xs">Detail</span>
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
    function get_update(id){
        $.ajax({
            url:"<?php echo site_url('view_update_testimoni.aspx'); ?>",
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
            url:"<?php echo site_url('view_detail_testimoni.aspx'); ?>",
            type:"POST",
            cache:false,
            data:"id="+id,
            success:function(data){
                $("#edit").html(data);
            }
        });
    }
</script>