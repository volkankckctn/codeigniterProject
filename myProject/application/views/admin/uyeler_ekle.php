<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Üye Ekleme
                </div>
                <p class="text-danger">&ensp; <?=$this->session->flashdata("msj_eksik");?> </p>
                <form class="form-horizontal" action="<?=base_url()?>admin/uyeler/ekle_kaydet" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Ad: <b class="alert-danger">*</b> </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="ad" placeholder="İsminiz.." required>
                        </div>
                        <div class="btn-group control-label col-sm-offset-2">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Avatarını Seç... &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            </button>
                            <div class="dropdown-menu">
                                <?php
                                for($i=1;$i<15;$i++){ ?>
                                    <input type="radio" value="(<?=$i?>).png"  <?= ($i==1) ? "checked=''" : "";?> name="icon"/> <img width="60" height="60" src="<?=base_url()?>assets/admin/img/(<?=$i?>).png"/>
                                    <?php $i++; ?>
                                    <input type="radio" value="(<?=$i?>).png" name="icon"> <img width="60" height="60" src="<?=base_url()?>assets/admin/img/(<?=$i?>).png"/><br><br>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?=$this->session->flashdata("msj_name_eksik");?>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Soyad: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="soyad" placeholder="Soyisminiz.." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Kullanıcı Adı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="kullaniciadi" placeholder="Kullanıcı Adınız..." required>
                        </div>

                    </div>
                    <?php if($this->session->flashdata("msj_kontrol")){?>
                        <div class="form-group">
                            <div class="col-sm-offset-4">
                                <i class="alert-danger"> <?=$this->session->flashdata("msj_kontrol");?></i>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >E-mail: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" placeholder="E-mail'iniz...." required>
                        </div>
                    </div>
                    <?php if($this->session->flashdata("msj_kontrol_e")){?>
                        <div class="form-group">
                            <div class="col-sm-offset-4">
                                <i class="alert-danger"> <?=$this->session->flashdata("msj_kontrol_e");?></i>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" >Şifre: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="sifre" placeholder="Şifreniz...." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Şifre (Tekrar): <b class="alert-danger" >*</b></label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="confirm" placeholder="" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Telefon:</label>
                        <div class="col-sm-4">
                            <input type="tel" class="form-control" name="tel" placeholder="532....">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Adres:</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="adres" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Durum:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="durum">
                                <option>Aktif</option>
                                <option>Pasif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Yetki:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="yetki">
                                <option>Admin</option>
                                <option>Üye</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Bülten Aboneliği:</label>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="bulten">(Kampanyalardan Haberdar olmak istiyorum!)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a href="<?=base_url()?>admin/uyeler" class="btn btn-danger">Vazgeç</a>
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>