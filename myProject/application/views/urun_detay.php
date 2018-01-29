<div class="col-sm-9 padding-right">
    <h2 class="title text-center"><?=$urun[0]->name?> Ürününün Detayı</h2>

    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="<?=base_url()?>uploads/<?=$urun[0]->preview_img?>">
            </div>
        </div>

        <form action="<?=base_url()?>uye/sepet_ekle/<?=$urun[0]->id?>" method="post">
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <b class="text-success"> <?=$this->session->flashdata("basari");?>
                        <b class="text-danger"> <?=$this->session->flashdata("basarisiz");?>


                        </b> <br><br>


                        <h2><?=$urun[0]->name?></h2>
                        <p>Ürün id: <?=$urun[0]->id?></p>
                        <span>
                            <span><?=$urun[0]->s_price?> ₺</span>
                                <label>Miktar:</label>
                                <?php if(!$urun[0]->stock==0){?>

                                        <input type="number" name="adet" value="1" min="1" max="<?=$urun[0]->stock?>">
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Sepete Ekle
                                        </button>

                                <?php }else{?>
                                    Ürünün Stokta Yok!
                                <?php } ?>
                        </span>

                        <?php $x=$urun[0]->cat_id; ?>
                        <p><b>Stock Durumu:</b> <?=$urun[0]->stock?> Adet</p>
                        <p><b>Kategori:</b> <?=$urun[0]->cat_name?></p>
                            <?php if(!$urun[0]->grup==NULL){?>
                        <p><b>Ürün durumu:</b> <?=$urun[0]->grup?></p>
                            <?php } ?>
                        <p><b>Satıcı:</b> volkanikdaglar.com</p>
                    </div><!--/product-information-->
                </div>
        </form>


    </div>

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#detay" data-toggle="tab">Ürün Detayları</a></li>
                <li class=""><a href="#galeri" data-toggle="tab">Ürün Resimleri</a></li>
                <li class=""><a href="#reviews" data-toggle="tab">Yapılan Yorumlar (<?=count($comment)?>)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade  active in" id="detay">
                <div class="col-sm-12">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <?=$urun[0]->description?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="galeri">
                <div class="col-sm-12">

                    <?php foreach ($galeri as $resim){ ?>
                        <div class="col-sm-3">
                            <img hspace="20" vspace="20" src="<?=base_url()?>uploads/<?=$resim->image?>" width="150"><br>
                            <center><i class="btn btn-success" data-toggle="modal" data-target="#<?=$resim->id?>" data-whatever="@getbootstrap">Büyüt</i></center>
                            <!-- POP UP AYARLARI -->
                            <div class="modal fade" id="<?=$resim->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <img width="100%" src="<?=base_url()?>uploads/<?=$resim->image?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- POP UP AYARLARI -->

                    <?php } ?>
                    <br>
                </div>
            </div>

            <div class="tab-pane fade" id="reviews">
                <div class="col-sm-12">
                    <?php foreach ($comment as $rs) {?>
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i><?=$rs->name?></a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i><?=$rs->date?></a></li>
                    </ul>
                    <p><b><?=$rs->comment?></b></p>
                    <?php } ?>
                    <br><br><br>
                    <p><b style="color: #fe980f">Yorum eklemek ister misin?</b></p>
                    <?php if($this->session->user_session){?>
                        <form action="<?=base_url()?>uye/yorum_yap/<?=$urun[0]->id?>" method="post">
                            <textarea name="comment"></textarea>
                            <button type="submit" class="btn btn-default pull-right">
                                Yorum Yap
                            </button>
                        </form>
                    <?php }else{ ?>
                        <a href="<?=base_url()?>home/login_sayfa">Yorum Yapmak için Giriş Yapın</a>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</section>