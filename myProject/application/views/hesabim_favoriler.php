<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Favori Ürünlerim</h2>
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div>
                    <P></P>
                    <b class="text-success"> <?= $this->session->flashdata("basari");?></b>

                </div>
                <?php if(count($fav)>0    ){?>
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>SıraNO</th>
                                <th><center>Ürün Resmi</center></th>
                                <th><center>Ürün Adı</center></th>
                                <th><center>Ürün Fiyatı</center></th>
                                <th><center>Ürünü Kaldır</center></th>
                            </tr>
                            </thead>
                            <?php
                            $sirano=1;
                            $sinif=null;
                            foreach ($fav as $f){
                            ?>
                            <tbody>
                            <!-- tablo renkleri -->
                            <!-- class="info" class="success" class="warning" class="danger"-->
                            <?php
                            if($sirano%3==0) $sinif="info";
                            if($sirano%3==1) $sinif="danger";
                            if($sirano%3==2) $sinif="warning";
                            ?>
                                <tr class="">
                                    <td><center><br><br><br><?=$sirano?></center></td>
                                    <td><center><img width="150" src="<?=base_url()?>uploads/<?=$f->preview_img?>" </center></td>
                                    <td><center><br><br><br><?=$f->name?></center></td>
                                    <td><center><br><br><br><?=$f->s_price?> ₺</center></td>
                                    <td><center><a href="<?=base_url()?>uye/favori_sil/<?=$f->id?>"><br><br><br>&ensp;&ensp;<i class="fa fa-times" style="color: #fe980f; width: 25px"><br><br><b>Kaldır</b></i> </center></a></td>
                                </tr>
                                <?php $sirano++;
                            }


                            ?>
                            </tbody>
                        </table>
                    </div>
                <?php }else{
                    echo "<center><b class='text-success'> "."Favori Ürününüz Bulunmamaktadır. Alışverişin Keyfini Çıkarın :)"."</b></center>";
                }?>

                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div><!--features_items-->





</div>
</div>
</div>
</section>