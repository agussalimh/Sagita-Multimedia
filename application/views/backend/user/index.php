<div class="row">
    <div class="col-sm-12">
        <?php echo form_open('update_state_user.aspx'); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="btn-group">
                        <a href="#" onclick="get_add()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a>
                        <input type="submit" name="active" value="Aktifkan" class="btn btn-success">
                        <input type="submit" name="nonactive" value="Nonaktifkan" class="btn btn-danger">
                    </div>
                </div>
            </div>
            <br>
            <?php alert() ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">User</div>
                </div>
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th><center><input type="checkbox" id="checkall" name="checkall"></center></th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++ ?>
                                <tr class="gradeX">
                                    <td align="center"><center><input type="checkbox" value="<?php echo $row->id_user;?>" name="id[]" ></center></td>
                                    <td><?php echo $row->name_user ?></td>
                                    <td><?php echo $row->username_user ?></td>
                                    <td><?php echo get_level($row->access_user) ?></td>
                                    <td><?php echo get_state($row->state_user) ?></td>
                                    <td class="center hidden-phone">
                                        <a href="#" onclick="get_update('<?php echo $row->id_user ?>')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
                <h4 class="modal-title">Tambah Data User</h4>
            </div>
            <?php echo form_open('add_user.aspx','class="form-horizontal"'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder="Masukkan Nama" autocomplete="off" maxlength="100" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Username</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder="Masukkan Username" autocomplete="off" maxlength="30" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Password</label>
                        <div class="col-sm-8">
                            <input type="password" onkeyup="getconf()" required placeholder="Masukkan Password" autocomplete="off" class="form-control" name="password">
                        </div>
                    </div>
                    <div id="err_conf" style="display: none;">
                        <span class="col-sm-4"></span>
                        <span class="col-sm-8" style="color:red">Konfirmasi Password Tidak Sama</span>
                        <br><br>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input id="co" type="password" onkeyup="confirm_pass()" required placeholder="Masukkan Konfirmasi Password" autocomplete="off" class="form-control" name="confirm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Level</label>
                        <div class="col-sm-8">
                            <select name="level" required class="form-control">
                                <option value="">Pilih Level</option>
                                <option value="1">Superadmin</option>
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
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
    function getconf(){
        var pass=$("[name='password']").val();
        var conf=$("[name='confirm']").val();
        if(conf==""){

        }else{
            confirm_pass();
        }
    }
    function confirm_pass(){
        var pass=$("[name='password']").val();
        var conf=$("[name='confirm']").val();
        if(pass!=conf){
            document.getElementById("err_conf").style.display='block';
            $("#submit").attr('disabled',true);
        }else{
            document.getElementById("err_conf").style.display='none';
            $("#submit").attr('disabled',false);
        }
    }
    function get_update(id){
        $.ajax({
            url:"<?php echo site_url('view_update_user.aspx'); ?>",
            type:"POST",
            cache:false,
            data:"id="+id,
            success:function(data){
                $("#edit").html(data);
            }
        });
    }

</script>