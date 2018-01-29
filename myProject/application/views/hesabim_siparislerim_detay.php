<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Siparişlerim</h2>
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div>
                    <P></P>
                    <P class="alert-info"> <?= $this->session->flashdata("msj");?></P>

                </div>
                <div class="table-responsive table-bordered">

                    <b class="text-success"><?=$this->session->flashdata("delete"); ?></b>
                    <table class="table">
                        <thead>
                        <tr>
                            <th><center>Sıra NO</center></th>
                            <th><center></center></th>
                            <th><center>Ürün Adı</center></th>
                            <th><center>Fiyatı</center></th>
                            <th><center>Adeti</center></th>
                        </tr>
                        </thead>
                        <?php
                        $sirano=1;
                        $sinif=null;?>
                        <tbody>
                        <!-- tablo renkleri -->
                        <!-- class="info" class="success" class="warning" class="danger"-->
                        <?php

                        foreach ($urunler as $msj){
                            if($sirano%3==0) $sinif="info";
                            if($sirano%3==1) $sinif="danger";
                            if($sirano%3==2) $sinif="warning";
                        ?>
                        <tr class="<?=$sinif?>">
                            <td><center><?=$sirano?></center></td>
                            <td><center><img width="50" src="<?=base_url()?>uploads/<?=$msj->urun_resim?>"</center></td>
                            <td><center><?=$msj->urun_adi?> </center></td>
                            <td><center><?=$msj->fiyat?> ₺</center></td>
                            <td><center><?=$msj->adet?></a></center></td>
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