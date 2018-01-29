<section id="cart_items">

    <div class="container">
        <b class="text-success"> <?=$this->session->flashdata("delete");?></b><br><br>
        <?php if(count($sepet)>0    ){?>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image"><center>Ürün Resmi</center></td>
                        <td class="description"><center>Ürün Adı</center></td>
                        <td class="price"><center>Fiyat</center></td>
                        <td class="quantity"><center>Adet</center></td>
                        <td class="total"><center>Toplam</center></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $toplam=0;
                    foreach ($sepet as $rs){?>
                        <tr>
                            <td class="cart_product">
                                <a href="<?=base_url()?>home/urun_detay_sayfa/<?=$rs->id?>"><center><img src="<?=base_url()?>uploads/<?=$rs->preview_img?>" width="125" alt=""></center></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="<?=base_url()?>home/urun_detay_sayfa/<?=$rs->id?>"><center><?=$rs->name?></center></a></h4>
                            </td>
                            <td class="cart_price">
                                <p><center><?=$rs->s_price?> ₺</center></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <p><center><?=$rs->adet?></center></p>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><center><?= $rs->s_price * $rs->adet ?> ₺</center> </p>
                            </td>
                            <?php
                            $toplam=$toplam+($rs->s_price * $rs->adet);
                            ?>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" onclick="return confirm('Emin misiniz ?')" href="<?=base_url()?>uye/sepet_sil/<?=$rs->id?>"><i class="fa fa-times" style="color: #fe980f;" ></i></a>
                            </td>
                        </tr>
                    <?php }
                    if($toplam>=50){
                        $x=0;
                    }else{
                        $x=5.99;
                    }

                    ?>
                    </tbody>
                </table><br>
                <div class="col-sm-12"><br>
                    <div class="total_area col-sm-12">
                        <ul>
                            <li>Sepet Toplamı (KDV Hariç)<span><?=$toplam?> ₺</span></li>
                            <li>Kargo Ücreti (50 ₺ ve Üzeri Alışverişlere Ücretsiz Kargo) <span><?=($x==0)?"Ücretsiz Kargo":$x."₺"?></span></li>
                            <li>KDV (%8) <span><?=(($toplam*8)/100)?> ₺</span></li>
                            <li>Genel Toplam <span><?=($toplam+($toplam*8)/100)+$x?> ₺</span></li>
                        </ul>
                    </div>
                    <div class="total_area col-sm-12 ">
                        <div class="col-sm-10"></div>
                        <a class="btn btn-default check_out padding-right" href="<?=base_url()?>uye/siparis_tamamla">Alışverişi Tamamla</a>
                    </div>
                </div>

            </div>
        <?php }else{
            echo "<center><b class='text-success'> "."Sepetinizde Ürün Bulunmamaktadır. Alışverişin Keyfini Çıkarın :)"."</b></center>";
        }?>
    </div>
    <br><br>
</section>

		</div>
	</section>