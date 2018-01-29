<div class="col-sm-9 padding-right">
    <div class="row">
        <h2 class="title text-center">Kampanyada Olan Ürünler</h2>
        <div class="col-sm-12">
            <?php foreach ($kampanya as $rs2){?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="<?=base_url()?>home/urun_detay_sayfa/<?=$rs2->id?>">
                                    <img src="<?=base_url()?>uploads/<?=$rs2->preview_img?>" width="100" height="250" />
                                </a>
                                <h2><?=$rs2->s_price?> ₺</h2>
                                <p><?=$rs2->name?></p>
                                <a href="<?=base_url()?>uye/sepet_ekle/<?=$rs2->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="<?=base_url()?>uye/favori_ekle/<?=$rs2->id?>"><i class="fa fa-plus-square"></i>Favori Ürünlerime Ekle</a></li>
                                <li><a href="<?=base_url()?>home/urun_detay_sayfa/<?=$rs2->id?>"><i class="fa fa-plus-square"></i>Ürünü İncele</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            <?php }?>
        </div>
    </div>

</div>
</section>