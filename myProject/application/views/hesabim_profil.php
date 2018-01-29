<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Üye Hesap Bilgileri</h2>
        <form class="form-horizontal" action="<?=base_url()?>uye/profil_degis/<?=$uye[0]->id?>" method="post">

            <div class="form-group">
                <label class="control-label col-sm-2"></label>
                <div class="col-sm-4">
                    <b class="text-success"><?= $this->session->flashdata("msj_guncelle");$this->session->flashdata("degis");?></b>
                </div>
            </div>
                <div class="form-group">
                        <center>
                        <div class="dropdown-men2u">
                            <?php
                            $resimismi="";
                            $sonuc=0;
                            for($x=1;$x<15;$x++){
                                $resimismi="($x).png";
                                if($resimismi==$uye[0]->image){
                                    $sonuc=$x;
                                }
                            }
                            for($i=1;$i<15;$i++){ ?>
                                <input type="radio" value="(<?=$i?>).png"  <?= ($i==$sonuc) ? "checked=''" : "";?> name="icon"/> <img width="65" height="60" src="<?=base_url()?>assets/admin/img/(<?=$i?>).png"/>
                                <?php $i++; if($i%4==0){ echo "<br><br>"; } ?>
                                <input type="radio" value="(<?=$i?>).png" <?= ($i==$sonuc) ? "checked=''" : "";?> name="icon"> <img width="65 " height="60" src="<?=base_url()?>assets/admin/img/(<?=$i?>).png"/>
                            <?php }
                            ?>
                        </div></center>
                </div>
                <div class="form-group">
                    <center>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </center>
                </div>

        </form>




    </div><!--features_items-->





</div>
</div>
</div>
</section>