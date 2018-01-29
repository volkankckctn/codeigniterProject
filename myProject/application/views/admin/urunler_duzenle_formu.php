<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Ürün Düzenleme
                </div>
                <p class="text-danger">&ensp; <?=$this->session->flashdata("msj_eksik");?> </p>

                <form class="form-horizontal" action="<?=base_url()?>admin/urunler/guncelle/<?=$veri[0]->id ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Kategori : <b class="alert-danger">*</b> </label>
                        <div class="col-sm-4">
                            <select class="form-control" name="kategori">

                                <?php
                                foreach ($cat as $rs){
                                    if($rs->id){
                                        ?>
                                        <option <?=($veri[0]->cat_id==$rs->id)? "selected" : ""?>><?=$rs->id?> - <?=$rs->name?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Ürün ismi: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?=$veri[0]->name ?>" name="name" placeholder="Soyisminiz.." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Alış Fiyatı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?=$veri[0]->b_price ?> ₺" name="b_price" placeholder="Kullanıcı Adınız..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Satış Fiyatı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?=$veri[0]->s_price ?> ₺" name="s_price" placeholder="E-mail'iniz...." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" >Stok Miktarı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?=$veri[0]->stock ?>" name="stock" placeholder="Şifreniz...." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" >Açıklama: <b class="alert-danger">*</b></label>
                        <div class="col-sm-9">
                            <textarea name="description" id="editor1" rows="10" cols="80"><?=$veri[0]->description ?></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Anahtar Kelime: <b class="alert-danger" >*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?=$veri[0]->keywords?>" name="keywords" placeholder="" required>
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