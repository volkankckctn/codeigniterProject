<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Şifre Değiştir</h2>
        <form class="form-horizontal" action="<?=base_url()?>uye/sifre_degistir/<?=$this->session->user_session["id"]?>" method="post">


            <div class="form-group">
                <label class="control-label col-sm-2"></label>
                <div class="col-sm-4">

                    <p class="text-danger">&ensp; <?=$this->session->flashdata("sifre_yanlis");?> </p>
                    <p class="text-success"> <?= $this->session->flashdata("msj_guncelle");?> </p>
                    <p class="text-success"> <?= $this->session->flashdata("degis");?> </p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Eski Şifreniz:</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" value="" name="old" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Yeni Şifreniz:</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" value="" name="new" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Yeni Şifreniz: (Tekrar) </label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" value="" name="confirm" placeholder="" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Şifre Değiştir</button>
                </div>

            </div>

        </form>




    </div><!--features_items-->





</div>
</div>
</div>
</section>