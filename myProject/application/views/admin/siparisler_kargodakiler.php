<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Kargodaki Siparişler
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
									<th>Sipariş ID</th>
                                    <th>İsim</th>
                                    <th>Tutar</th>
                                    <th>Tarih</th>
                                    <th>Durum</th>
                                    <th>Detay</th>
                                </tr>
                                </thead>
                                <?php
                                $sirano=1;
                                $sinif=null;
                                foreach ($veri as $rs){
                                if($rs->siparis_durumu=="Kargoya Verildi"){
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
                                    <td><?=$rs->ad_soyad?></td>
                                    <td><?=$rs->tutar?> ₺</td>
                                    <td><?=$rs->tarih?></td>
                                    <td><?=$rs->siparis_durumu?></td>
                                    <td><a href="<?=base_url()?>admin/siparisler/siparis_kargo_detay/<?=$rs->id?>"><p class="btn btn-success " >AÇ</p></a></td>
                                </tr>
                                <?php
                                $sirano++;
                                }}
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