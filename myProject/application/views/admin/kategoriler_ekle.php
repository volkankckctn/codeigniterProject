<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Kategori Ekle
                </div>
                <p class="text-danger">&ensp; <?=$this->session->flashdata("msj_eksik");?> </p>

                <form class="form-horizontal" action="<?=base_url()?>admin/kategoriler/ekle_kaydet" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Kategori ismi: <b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="" name="name" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Üst Kategori id:<b class="alert-danger">*</b></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="parent_id">
                                <option name="0">0 - Ana Kategori</option>
                                <?php
                                foreach ($veri as $rs){
                                    if($rs->id){
                                        ?>
                                        <option name="<?=$rs->id?>"><?=$rs->id?> - <?=$rs->name?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
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
                        <label class="control-label col-sm-2" for="pwd" >Açıklama: <b class="alert-danger">*</b></label>
                        <div class="col-sm-9">
                            <textarea name="description" id="editor1" rows="10" cols="80"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Kategori Ekle</button>
                        </div>
                    </div>



                </form>

            </div>
        </div>
    </div>
</div>