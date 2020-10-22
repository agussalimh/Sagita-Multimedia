<form action="<?php echo site_url('filter_product.aspx') ?>" class="form-horizontal" method="post">
    <?php echo form_hidden('search', '1'); ?>
    <div class="form-group">
        <label class="col-sm-4">Nama Produk</label>
        <div class="col-sm-8">
            <input type="text" placeholder="Masukkan Nama Produk" autocomplete="off" maxlength="30" class="form-control" name="product">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Harga (Rp.)</label>
        <div class="col-sm-8">
            <input type="text" onkeypress="return nomer(this)" onkeyup="return uang(this)" placeholder="Masukkan Harga" autocomplete="off" class="form-control" name="price">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Diskon</label>
        <div class="col-sm-8">
            <input type="radio" value="1" name="filter-dis" class="js-switch"/> Ya &nbsp;
            <input type="radio" value="2" name="filter-dis" class="js-switch"/> Tidak
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Stok</label>
        <div class="col-sm-8">
            <div class="spinner3">
                <div class="input-group" style="width:250px;">
                    <input type="text" onkeypress="return nomer(this)" class="spinner-input form-control" maxlength="5" name="stock">
                    <div class="spinner-buttons input-group-btn">
                        <button type="button" class="btn btn-primary spinner-up">
                            <i class="fa fa-angle-up"></i>
                        </button>
                        <button type="button" class="btn btn-primary spinner-down">
                            <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Berat (gram)</label>
        <div class="col-sm-8">
            <input type="text" onkeypress="return nomer(this)" placeholder="Masukkan Berat Barang" autocomplete="off" class="form-control" name="weight">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4">Kategori</label>
        <div class="col-sm-8">
            <select name="category" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach ($category as $value => $row): ?>
                    <option value="<?php echo $row->id_category ?>"><?php echo $row->category ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
    </center>
</form>