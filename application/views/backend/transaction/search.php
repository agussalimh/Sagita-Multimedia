<div class="row">
    <div class="col-sm-12">
        <div class="panel-group " id="accordion">
            <div class="panel" style="overflow: inherit;">
                <div class="panel-heading accordion-toggle" style="cursor: pointer;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <h4 class="panel-title">
                        <a>
                            Filter Transaksi
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php include "filter_search.php" ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-success">
            <strong>Sukses!</strong> <span>Data Berhasil Di Temukan Sebanyak <b><?php echo $jumlah ?></b> Baris.</span>
            <button type="button" class="close close-sm" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <?php echo form_open('update_state_transaction.aspx'); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="btn-group">
                        <input type="submit" name="warning" value="Pending" class="btn btn-warning">
                        <input type="submit" name="fixed" value="Sampai" class="btn btn-success">
                        <input type="submit" name="delete" value="Hapus" class="btn btn-danger">
                    </div>
                </div>
            </div>
            <br>
            <?php alert() ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Transaksi</div>
                </div>
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <center>
                                        <input type="checkbox" id="checkall" name="checkall">
                                    </center>
                                </th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Waktu Belanja</th>
                                <th>Total Belanja</th>
                                <th>Status</th>
                                <th><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++ ?>
                                <tr class="gradeX">
                                    <td align="center">
                                        <center>
                                            <input type="checkbox" value="<?php echo $row->id_transaction;?>" name="id[]" >
                                        </center>
                                    </td>
                                    <td><?php echo $row->name_customer ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->phone ?></td>
                                    <td><?php echo $row->time_transaction ?></td>
                                    <td>Rp.<?php echo uang($row->total_transaction) ?></td>
                                    <td><?php echo get_statetransaction($row->state) ?></td>
                                    <td class="center hidden-phone">
                                        <a href="javascript:void(0)" onclick="window.location.href='<?php echo site_url('detail_transaction.aspx/'.$row->id_transaction)?>'" class="btn btn-info btn-xs">
                                            <i class="fa fa-eye"></i> 
                                            <span class="hidden-xs"> Detail</span>
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
<div id="transfer"></div>

<script src="<?php echo base_url()?>assets/backend/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/date/moment-with-locales.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/date/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("input[name=checkall]").click(function(){
    
        if(!$(this).is(':checked'))
            $(this).parents('table').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('input[type=checkbox]').attr('checked',true);
            
        });    
    });
    
    $('.default-date-picker').datetimepicker({
        format: 'YYYY-MM-D'
    });
</script>