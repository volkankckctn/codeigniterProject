<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Mesajlar</h2>
        <div class="panel panel-default">
            <div class="panel-heading" >
                Gönderilen Mesajlar  <a class="btn btn-secondary" href="<?=base_url()?>home/bize_yazin">Yeni Mesaj Gönder</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div>
                    <P></P>
                    <P class="alert-info"> <?= $this->session->flashdata("msj");?></P>

                </div>
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SıraNO</th>
                            <th><center>Mesajın Konusu</center></th>
                            <th><center>Cevaplanma Durumu</center></th>
                            <th><center>Mesajınız</center></th>
                            <th><center>Cevabı Aç</center></th>
                        </tr>
                        </thead>
                        <?php
                        $sirano=1;
                        $sinif=null;?>
                        <tbody>
                        <!-- tablo renkleri -->
                        <!-- class="info" class="success" class="warning" class="danger"-->
                        <?php

                        foreach ($mesaj as $msj){
                            if($sirano%3==0) $sinif="info";
                            if($sirano%3==1) $sinif="danger";
                            if($sirano%3==2) $sinif="warning";
                        ?>
                        <tr class="<?=$sinif?>">
                            <td><?=$sirano?></td>
                            <td><center><?=$msj->subject?></center></td>
                            <td><center><?=($msj->cevap)?"<i class='fa fa-check'></i>":"<i class='fa fa-times'></i>"?></center></td>
                            <td><center><i class="btn btn-success" data-toggle="modal" data-target="#<?=$msj->id?>_2" data-whatever="@getbootstrap">Mesajınız</i></center></td>
                            <td><center><i class="btn btn-success" data-toggle="modal" data-target="#<?=$msj->id?>" data-whatever="@getbootstrap">Cevap</i></center></td>
                        </tr>
                            <!-- POP UP AYARLARI -->
                            <div class="modal fade" id="<?=$msj->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Mesaj:</label>
                                                <?=$msj->cevap?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- POP UP AYARLARI -->
                            <!-- POP UP AYARLARI -->
                            <div class="modal fade" id="<?=$msj->id?>_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Mesaj:</label>
                                                <?=$msj->message?>
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