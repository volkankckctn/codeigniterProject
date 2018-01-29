<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Yorumlarım</h2>
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
                            <th>SıraNO</th>
                            <th><center>Yorum Yapılan Ürün</center></th>
                            <th><center>Yorum Tarihi</center></th>
                            <th><center>Yorumunuz</center></th>
                            <th><center><i class="text-danger">Yorumu Sil</i></center></th>
                        </tr>
                        </thead>
                        <?php
                        $sirano=1;
                        $sinif=null;?>
                        <tbody>
                        <!-- tablo renkleri -->
                        <!-- class="info" class="success" class="warning" class="danger"-->
                        <?php

                        foreach ($yorum as $msj){
                            if($sirano%3==0) $sinif="info";
                            if($sirano%3==1) $sinif="danger";
                            if($sirano%3==2) $sinif="warning";
                        ?>
                        <tr class="<?=$sinif?>">
                            <td><?=$sirano?></td>
                            <td><center><?=$msj->urun_adi?></center></td>
                            <td><center><?=$msj->date?></center></td>
                            <td><center><i class="btn btn-success" data-toggle="modal" data-target="#<?=$msj->id?>" data-whatever="@getbootstrap">Yorumunuz</i></center></td>
                            <td><center><a href="<?=base_url()?>uye/yorum_sil/<?=$msj->id?>"><i class="fa fa-times-circle"></i> </a></center></td>
                        </tr>
                            <!-- POP UP AYARLARI -->
                            <div class="modal fade" id="<?=$msj->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Yorumunuz:</label>
                                                <?=$msj->comment?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- POP UP AYARLARI -->
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