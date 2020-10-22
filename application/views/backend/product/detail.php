<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Detail Data Produk <?php echo $get['name_product'] ?></h4>
            </div>
            <div class="modal-body" style="height: 450px;overflow-y: scroll;">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Produk</th>
                        <td><?php echo $get['name_product'] ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Produk</th>
                        <td><?php echo $get['information_product'] ?></td>
                    </tr>
                    <tr>
                        <th>Slug/Url</th>
                        <td><?php echo $get['slug_product'] ?></td>
                    </tr>
                    <tr>
                        <th> Harga</th>
                        <td>Rp.<?php echo uang($get['price_product']) ?></td>
                    </tr>
                    <?php if ($get['state_discount']==1): ?>
                        <tr>
                            <th> Harga Diskon</th>
                            <td>Rp.<?php echo uang($get['discount_product']) ?></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <th> Stok</th>
                        <td><?php echo $get['stock_product'] ?></td>
                    </tr>
                    <tr>
                        <th> Berat</th>
                        <td><?php echo $get['weight_product'] ?> gram</td>
                    </tr>
                    <?php $cat=$this->M__app->gradeone('category','id_category',$get['category_product'])->row_array() ?>
                    <tr>
                        <th> Kategori</th>
                        <td><?php echo $cat['category'] ?></td>
                    </tr>
                    <tr>
                        <th> Gambar Produk</th>
                        <td><img src="<?php echo base_url('uploads/'.$get['image_product']) ?>" width="185px" height="280px;"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div id="transfer"></div>
<script>
    $("#update").modal("show");
</script>
