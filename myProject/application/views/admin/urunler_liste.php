<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Ürün Listesi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <h4 class="btn btn-info btn-xs">
                            <p class="fa fa-tags"></p><a href="<?=base_url()?>admin/urunler/ekle"><b > Ürün Ekle </b></a>
                        </h4>
                        <div>
                            <P></P>
                            <P class="alert-info"> <?= $this->session->flashdata("msj_resim_ekle");?></P>
                            <P class="alert-info"><?=$this->session->flashdata("msj_guncelle");?></P>
                            <P class="alert-info"><?=$this->session->flashdata("msj_insert");?></P>
                            <P class="alert-danger"><?=$this->session->flashdata("msj_delete");?></P>

                        </div>
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Adı</th>
                                    <th>Kategori</th>
                                    <th>Alış Fiyatı</th>
                                    <th>Satış Fiyatı</th>
                                    <th>Resim</th>
                                    <th>Galeri</th>
                                    <th>Düzenle</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>
                                <?php
                                $sirano=1;
                                $sinif=null;
                                foreach ($veriler as $rs){
                                ?>
                                <tbody>
                                <!-- tablo renkleri -->
                                <!-- class="info" class="success" class="warning" class="danger"-->
                                <?php
                                if($sirano%3==0) $sinif="info";
                                if($sirano%3==1) $sinif="danger";
                                if($sirano%3==2) $sinif="warning";
                                ?>
                                <tr class="<?=$sinif?>">
                                    <td><?=$sirano?></td>
                                    <td><?=$rs->name?></td>
                                    <td><?=$rs->katadi?></td>
                                    <td><?=$rs->b_price?> ₺</td>
                                    <td><?=$rs->s_price?> ₺</td>
                                    <td ><?php if($rs->preview_img){?>
                                            &ensp;
                                            <a href="<?=base_url()?>admin/urunler/resim_yukle/<?=$rs->id?>">
                                                <img src="<?=base_url()."uploads/".$rs->preview_img?>" height="30" width="40">
                                            </a>

                                        <?php } else {?>
                                    <a href="<?=base_url()?>admin/urunler/resim_yukle/<?=$rs->id?>" class="btn-success btn-sm btn-small btn-xs">Resim Ekle</a>
                                        <?php } ?>
                                    </td>
                                    <td><a href="<?=base_url()?>admin/urunler/galeri_yukle/<?=$rs->id?>" class="btn-success btn-sm btn-small btn-xs">Galeri Ekle</a></td>
                                    <td><a href="<?=base_url()?>admin/urunler/duzenle/<?=$rs->id?>"><i class="btn btn-warning " > <i class="fa fa-edit"></i>Düzenle</i></a></td>
                                    <td><a href="<?=base_url()?>admin/urunler/sil/<?=$rs->id?>" onclick="return confirm('Emin misiniz ?')"><i class="btn btn-danger"><i class="fa fa-times-circle"></i> Sil</i></a></td>
                                </tr>
                                <?php
                                $sirano++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
    </div>
</div>