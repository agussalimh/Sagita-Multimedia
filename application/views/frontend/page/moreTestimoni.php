<?php foreach ($testimony as $row): ?>

<div class="row review-item">
    <div class="col-lg-3 col-sm-3  left">
        <div class="review-item-user">
            <div class="user-name">
                <p><?php echo $row->name ?></p>
                <small><?php echo $row->time ?></small>
            </div>
        </div>
    </div>
    <div class="col-lg-9  col-sm-9 right">
        <p class="commentText">
            <?php echo $row->testimony ?>
        </p>
    </div>
</div>
<hr>

<?php endforeach ?>

<div class="more<?=$offset?>">

  <?php if ($num!=0): ?>

    <input type="hidden" id="offset" value="<?=$offset+10?>">
    <center style='font-size:12px;'>
        <a onclick="moreTestimoniAll()" href="javascript:void(0)" class="btn btn-info">
            <i>Muat selanjutnya...</i>
        </a>
    </center>

  <?php endif ?>

</div>
<script>
   function moreTestimoniAll()
   {
       var batas=$("#offset").val();
       $.ajax({
         url:"<?=site_url('moreTestimony.aspx')?>",
         type:"POST",
         cache:false,
         data:{"offset":batas},
         success:function(data){
          $(".more<?=$offset?>").html(data);
         }
       });
   }
</script>