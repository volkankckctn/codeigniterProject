<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Ürün Resim Galerisi Ekleme
                </div>
                <p></p><b class="alert-warning"">
                &ensp;* Yüklenecek Resim Dosya Türleri (JPEG - GIF - PNG )<br>
                &ensp;* Max Boyutlar 1024x1024 , 1000Kb
                <br><br>
                <P class="alert-info"><?=$this->session->flashdata("msj_galeri_ekle");?></P>
                <P class="alert-danger"><?=$this->session->flashdata("galeri_delete");?></P>
                <P></P>
                <br><br>
                <form class="form-horizontal" action="<?=base_url()?>admin/urunler/galeri_kaydet/<?=$id?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-2"> <b class="alert-danger"></b> </label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="resim" placeholder="Yüklemek için Gözat" onchange="this.form.submit()">
                        </div>

                    <br><br>
                </form>
                <br><br>
                <br><br>
                <?php foreach ($veri as $rs) { ?>
                        <img hspace="15" src="<?= base_url() ?>uploads/<?= $rs->image ?>" height="100">
                        <a href="<?=base_url()?>admin/urunler/galeri_sil/<?=$id?>/<?=$rs->id?>" onclick="return confirm('Emin misiniz ?')">Sil</a>
                <?php } ?>

            </div>
        </div>
    </div>
</div>