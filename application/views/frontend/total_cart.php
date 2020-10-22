<?php
    $jumlah=array();
    foreach ($this->cart->contents() as $items): 
    $jumlah[]=$items['price'];
    endforeach;
?>
 <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"> Toggle navigation </span> 
        <span class="icon-bar"> </span> 
        <span class="icon-bar"> </span> 
        <span class="icon-bar"> </span>
    </button>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart">
        <i class="fa fa-shopping-cart colorWhite"> </i> 
        <span class="cartRespons colorWhite"> Keranjang (<?php echo uang(array_sum($jumlah)) ?>) <?php if (count($this->cart->contents())>0): ?>
            <b class="caret"></b>
        <?php endif ?> 
        </span>
    </button>
    <span class="navbar-brand " style="margin-top:8px;margin-bottom:-10px;" href="#"></span>
    <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
        <div class="input-group">
            <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
        </div>
    </div>
</div>
<script>
    $(".getFullSearch").on('click', function (e) {
        $('.search-full').addClass("active"); //you can list several class names 
        e.preventDefault();
    });
    $('.search-close').on('click', function (e) {
        $('.search-full').removeClass("active"); //you can list several class names 
        e.preventDefault();
    });
</script>