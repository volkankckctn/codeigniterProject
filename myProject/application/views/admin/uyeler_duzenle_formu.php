<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Üye Düzenleme
                </div>
                <p class="text-danger">&ensp; <?=$this->session->flashdata("msj_eksik");?> </p>
                <form class="form-horizontal" action="<?=base_url()?>admin/uyeler/guncelle/<?=$veri[0]->id ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Ad: <b class="alert-danger">*</b> </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?=$veri[0]->name ?>" class="form-control" name="ad" placeholder="İsminiz.." required>
                        </div>
                        <div class="btn-group control-label col-sm-offset-2">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Avatarını Seç... &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            </button>
                            <div class="dropdown-menu">
                                <?php
                                $resimismi="";
                                $sonuc=0;
                                for($x=1;$x<15;$x++){
                                    $resimismi="($x).png";
                                    if($resimismi==$veri[0]->image){
                                        $sonuc=$x;
                                    }
                                }
                                for($i=1;$i<15;$i++){ ?>
                                    <input type="radio" value="(<?=$i?>).png"  <?= ($i==$sonuc) ? "checked=''" : "";?> name="icon"/> <img width="60" height="60" src="<?=base_url()?>assets/admin/img/(<?=$i?>).png"/>
                                    <?php $i++; ?>
                                    <input type="radio" value="(<?=$i?>).png" <?= ($i==$sonuc) ? "checked=''" : "";?> name="icon"> <img width="60" height="60" src="<?=base_url()?>assets/admin/img/(<?=$i?>).png"/><br><br>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?=$this->session->flashdata("msj_name_eksik");?>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Soyad: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?=$veri[0]->surname ?>" name="soyad" placeholder="Soyisminiz.." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Kullanıcı Adı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?=$veri[0]->username ?>" name="kullaniciadi" placeholder="Kullanıcı Adınız..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >E-mail: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" value="<?=$veri[0]->email ?>" name="email" placeholder="E-mail'iniz...." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" >Şifre: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" value="<?=$veri[0]->password ?>" name="sifre" placeholder="Şifreniz...." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Şifre (Tekrar): <b class="alert-danger" >*</b></label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" value="<?=$veri[0]->password?>" name="confirm" placeholder="Şifre Tekrar" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Telefon:</label>
                        <div class="col-sm-4">
                            <input type="tel" class="form-control" value="<?=$veri[0]->tel?>" name="tel" placeholder="532....">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Adres:</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="adres" rows="3"><?=$veri[0]->address?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Durum:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="durum">
                                <option <?= ($veri[0]->status=='1') ? "selected='selected'" : "";?>> Aktif </option>
                                <option <?= ($veri[0]->status=='0') ? "selected='selected'" : "";?>> Pasif </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Yetki:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="yetki">
                                <option <?= ($veri[0]->authorty=='1') ? "selected='selected'" : "";?>> Admin </option>
                                <option <?= ($veri[0]->authorty=='0') ? "selected='selected'" : "";?>> Üye </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Bülten Aboneliği:</label>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="bulten" <?= ($veri[0]->newsletter=='1') ? "checked='checked'" : "";?> >(Kampanyalardan Haberdar olmak istiyorum!)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Güncelle</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>