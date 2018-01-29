<div class="col-sm-9 padding-right">
    <?php
        $toplam=0;
        foreach ($sepet as $urun){
            $toplam+=($urun->s_price * $urun->adet);
        }
        if($toplam>=50){
            $x=0;
        }else{
            $x=5.99;
        }
        $toplam=($toplam+($toplam*8)/100)+$x;
    ?>
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Siparişini tamamla</h2>
        <form class="form-horizontal" action="<?=base_url()?>uye/satin_al" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2"></label>
                <div class="col-sm-4">
                    <b class="text-success"><?=$this->session->flashdata("msj_guncelle");?></b>
                    <b class="text-success"><?=$this->session->flashdata("degis");?></b>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-4" >İsim Soyisim:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?=$this->session->user_session["name"]?> <?=$this->session->user_session["surname"]?>" name="ad_soyad" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" >Telefon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?=$this->session->user_session["tel"]?>" name="tel" placeholder="" required>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-4" >Tutar: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?=$toplam?>" name="tutar" placeholder="" readonly required>
                        </div>
                        <div class="col-sm-1">
                            <label class="control-label">₺</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" >Ödeme Şekli:</label>
                        <div class="col-sm-6">
                            <select name="odeme_sekli">
                                <option>Kredi Kartı</option>
                                <option>Havale</option>
                                <option>Kapıda Ödeme</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd" >Adres: </label>
                <div class="col-sm-9">
                    <textarea name="adres"  rows="5"><?=$this->session->user_session["address"]?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Satın AL</button>
                </div>
            </div>
        </form>
    </div><!--features_items-->





</div>
</div>
</div>
</section>
	</section>

                