<?php if (count($this->cart->contents())!=0): ?>
<div class="navbar-cart collapse">
    <div class="cartMenu col-lg-4 col-xs-12 col-md-4 ">
        <div class="w100 miniCartTable scroll-pane2" style="height: auto;overflow-y: auto;">
            <table>
                <tbody>
                <?php
                $jumlah=array();
                 foreach ($this->cart->contents() as $items): 
                    $jumlah[]=$items['price'];
                ?>
                   <tr class="miniCartProduct">
                    <td class="miniCartProductThumb">
                        <div><a href="<?php echo site_url('product-details.aspx/'.$items['id_product']);?>"> <img src="<?php echo base_url('uploads/'.$items['picture']) ?>" alt="img">
                        </a></div>
                    </td>
                    <td>
                        <div class="miniCartDescription">
                            <h4>
                                <a href="<?php echo site_url('product-details.aspx/'.$items['id_product']);?>"> <?php echo $items['name'] ?> </a>
                            </h4>
                            <span>Jumlah: <b><?php echo $items['qty'] ?> item</b></span>
                            <div class="price">
                                <span> Rp.<?php echo uang($items['price']) ?> </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="removeCart('<?php echo $items['rowid']?>')" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="miniCartFooter  miniCartFooterInMobile text-right">
            <h3 class="text-center subtotal"> Total: Rp.<?php echo uang(array_sum($jumlah)); ?> </h3>
            <div class="row">
                <a href="javascript:void(0)" onclick="nullCart()" class="btn btn-sm btn-danger"> Kosongkan Keranjang </a>
                <a href="<?php echo site_url() ?>viewcart.aspx" class="btn btn-sm btn-info"> Lihat Keranjang Dan Proses Pemesanan </a>
            </div>
        </div>
    </div>
</div>
<?php endif ?>