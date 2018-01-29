<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Yeni Eklenen Ürünler</h2>
        <?php foreach ($yeni as $rs){?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="<?=base_url()?>home/urun_detay_sayfa/<?=$rs->id?>">
                                <img src="<?=base_url()?>uploads/<?=$rs->preview_img?>" width="100" height="250" />
                            </a>
                            <h2><?=$rs->s_price?> ₺</h2>
                            <p><?=$rs->name?></p>
                            <a href="<?=base_url()?>uye/sepet_ekle/<?=$rs->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
                        </div>

                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?=base_url()?>uye/favori_ekle/<?=$rs->id?>"><i class="fa fa-plus-square"></i>Favori Ürünlerime Ekle</a></li>
                            <li><a href="<?=base_url()?>home/urun_detay_sayfa/<?=$rs->id?>"><i class="fa fa-plus-square"></i>Ürünü İncele</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        <?php }?>
    </div><!--features_items-->

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Önerilen Ürünler</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <?php foreach ($random as $rs2){?>
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
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div><!--/recommended_items-->

</div>
</div>
</div>
</section>