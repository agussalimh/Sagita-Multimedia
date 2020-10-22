<div class="row">
	<div class="col-sm-12 text-center">
        <div class="panel panel-default text-center">
            <div class="panel-heading">
                <div class="panel-title text-center">Klik gambar Untuk mengaktifkan tema</div>
            </div>
        </div>
   		 <?php alert();?>
     </div>
     <br>
    <div class="col-sm-12">
	    <?php $no=0; foreach($skin as $row): $no++ ?>
	    <div class="col-sm-4 btn" onclick="document.getElementById('form-id_<?php echo $row->id_skin;?>').submit();">
	    	<?php echo form_open_multipart('update_skin.aspx/','class="form-horizontal", id="form-id_'.$row->id_skin.'"'); ?>
	        <?php if($row->skin_status == 1) {
	                $class='panel panel-primary';
	                $aksi=$row->ket.' - Tema Aktif';
	            } else {
	                $class='panel panel-header';
	                $aksi=$row->ket;
	            } ?>
	        <div class="<?php echo $class;?>">
	        	<input type="hidden" name="id_skin" value="<?php echo $row->id_skin;?>">
	            <div class="panel-heading">
	                <div class="panel-title text-center"><?php echo $aksi;?></div>
	            </div>
	            <div class="panel-body">
	                <div class="avatar-img">
	                    <img src="<?php echo base_url('skin/'.$row->example)?>" style="width:100%; height:170px;" alt="">
	                </div>
	            </div>
	        </div>
	        <?php echo form_close() ?>
	    </div>
	    <?php endforeach;?>
	</div>
</div>