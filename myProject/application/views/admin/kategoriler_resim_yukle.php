<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Kategori Resim Ekleme
                </div>
                <p></p><b class="alert-warning"">
                &ensp;* Yüklenecek Resim Dosya Türleri (JPEG - GIF - PNG )<br>
                &ensp;* Max Boyutlar 1024x1024 , 1000Kb
                <?php if($this->session->flashdata("mesaj")){?>
                    <div class="alert alert-warning">
                        <b class="alert-warning"><?=$this->session->flashdata("mesaj");?></b>

                    </div>
                <?php } ?>
                <P></P>
                <form class="form-horizontal" action="<?=base_url()?>admin/kategoriler/resim_kaydet/<?=$id?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-2"> <b class="alert-danger"></b> </label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="resim" placeholder="Yüklemek için Gözat" required>
                        </div>

                    <br><br>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="btn btn-success">Resmi Yükle</button>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php if($veri[0]->image) {?>
                            <img src="<?=base_url()?>uploads/<?=$veri[0]->image ?>" height="200" >
                        <?php } ?>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>