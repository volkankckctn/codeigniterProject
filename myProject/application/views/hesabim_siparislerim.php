<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Siparişlerim</h2>
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div>
                    <P></P>
                    <P class="alert-info"> <?= $this->session->flashdata("msj");?></P>
                    <b class="text-success"><?=$this->session->flashdata("delete"); ?></b>
                    <b class="text-success"><?=$this->session->flashdata("basarili"); ?></b><br>
                </div>
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SıraNO</th>
                            <th><center>siparis no</center></th>
                            <th><center>İsim</center></th>
                            <th><center>Tutar</center></th>
                            <th><center>Durum</center></th>
                            <th><center>Siparis Detayı</center></th>
                            <th><center></center></th>
                        </tr>
                        </thead>
                        <?php
                        $sirano=1;
                        $sinif=null;?>
                        <tbody>
                        <!-- tablo renkleri -->
                        <!-- class="info" class="success" class="warning" class="danger"-->
                        <?php

                        foreach ($siparis as $msj){
                            if($sirano%3==0) $sinif="info";
                            if($sirano%3==1) $sinif="danger";
                            if($sirano%3==2) $sinif="warning";
                        ?>
                        <tr class="<?=$sinif?>">
                            <td><?=$sirano?></td>
                            <td><center><?=$msj->id?></center></td>
                            <td><center><?=$msj->ad_soyad?> </center></td>
                            <td><center><?=$msj->tutar?> ₺</center></td>
                            <td><center><?=$msj->siparis_durumu?></a></center></td>
                            <td><center><a href="<?=base_url()?>uye/siparislerim_detay/<?=$msj->id?>">Detay</a></center></td>
                            <td><?php if($msj->siparis_durumu=="yeni"){?>
                                <center><a onclick="return confirm('Emin misiniz ?')" href="<?=base_url()?>uye/siparis_iptal/<?=$msj->id?>"><i class="fa fa-times-circle"></i> </a></center>
                                <?php }?>
                            </td>
                        </tr>
                        <?php $sirano++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div><!--features_items-->
</div>
</div>
</div>
</section>