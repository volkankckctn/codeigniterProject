<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Ürün Ekleme
                </div>
                <p class="text-danger">&ensp; <?=$this->session->flashdata("msj_eksik");?> </p>

                <form class="form-horizontal" action="<?=base_url()?>admin/urunler/ekle_kaydet" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Kategori:<b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="kategori">
                                <?php
                                    foreach ($veri as $rs){
                                        if($rs->id){
                                            ?>
                                            <option><?=$rs->id?> - <?=$rs->name?></option>
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
                            <input type="text" class="form-control" value="" name="name" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Alış Fiyatı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="" name="b_price" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Satış Fiyatı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="₺" name="s_price" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" >Stok Miktarı: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="" name="stock" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd" >Açıklama: <b class="alert-danger">*</b></label>
                        <div class="col-sm-9">
                            <textarea name="description" id="editor1" rows="10" cols="80"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Anahtar Kelime: <b class="alert-danger" >*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="" name="keywords" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Ürün Ekle</button>
                        </div>
                    </div>



                </form>

            </div>
        </div>
    </div>
</div>