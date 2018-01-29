<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Siparis Detayı
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div>
                            <P></P>
                            <P class="alert-info"> <?= $this->session->flashdata("basarili");?></P>

                            <P class="alert-success"> <?= $this->session->flashdata("msj");?></P>

                        </div>
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                <tr>
									<th>Ürün  ID</th>
                                    <th>Ürün Adı</th>
                                    <th>Fiyat</th>
                                    <th>Adet</th>
                                    <th>Tutar(Kdv Eklenmiş)</th>
                                </tr>
                                </thead>
                                <?php
                                $sirano=1;
                                $sinif=null;
                                foreach ($veri as $rs){
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
                                    <td><?=$rs->id?></td>
                                    <td><?=$rs->urun_adi?></td>
                                    <td><?=$rs->fiyat?> ₺</td>
                                    <td><?=$rs->adet?> </td>
                                    <td><?=$rs->tutar?> ₺</td>
                                </tr>
                                <?php
                                $sirano++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        <form class="form-horizontal" action="<?=base_url()?>admin/siparisler/siparis_guncelle/<?=$veri[0]->siparis_id?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Durum:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="siparis_durumu">
                                                <option>Kargoya Verildi</option>
                                                <option>Tamamlandı</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kargo Bilgisi:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?=$bilgi[0]->kargo?>" name="kargo" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd" >Açıklama: <b class="alert-danger">*</b></label>
                                <div class="col-sm-9">
                                    <textarea name="aciklama" rows="10" cols="80" readonly><?=$bilgi[0]->aciklama?></textarea>
                                </div>
                            </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
    </div>
</div>