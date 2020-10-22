<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Detail Data Testimoni <?php echo $get['name'] ?></h4>
            </div>
            <?php echo form_open_multipart('update_testimoni.aspx/'.$get['id_testimony'],'class="form-horizontal"'); ?>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td><?php echo $get['name'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $get['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Testimoni</th>
                            <td><?php echo $get['testimony'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    $("#detail").modal("show");
    $("form").submit(function(){
        $('button').attr('disabled','disabled');
    });
</script>