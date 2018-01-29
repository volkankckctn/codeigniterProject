<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Üye Hesap Bilgileri</h2>
        <form class="form-horizontal" action="<?=base_url()?>uye/uye_guncelle/<?=$this->session->user_session["id"]?>" method="post">


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
                        <label class="control-label col-sm-4" >Ad:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?=$this->session->user_session["name"]?>" name="name" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" >Soyad:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?=$this->session->user_session["surname"]?>" name="surname" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" >E-Mail: </label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" value="<?=$this->session->user_session["email"]?>" name="email" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd" >Telefon: </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" value="<?=$this->session->user_session["tel"]?>" name="tel" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                       <center><img width="150" src="<?=base_url()?>assets/admin/img/<?=$this->session->user_session["image"]?>"</center>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd" >Adres: </label>
                <div class="col-sm-9">
                    <textarea name="address"  rows="5"><?=$this->session->user_session["address"]?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>

            </div>

        </form>




    </div><!--features_items-->





</div>
</div>
</div>
</section>