<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Mesajlar
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div>
                            <P></P>
                            <P class="alert-info"> <?= $this->session->flashdata("msj_delete");?></P>

                            <P class="alert-success"> <?= $this->session->flashdata("msj");?></P>

                        </div>
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                <tr>
									<th>SıraNO</th>
                                    <th>Gönderenin Adı</th>
                                    <th>Mesajın Konusu</th>
                                    <th>Okundu</th>
                                    <th>Cevaplandı</th>
                                    <th>Mesajı Aç</th>
									<th>SİL</th>
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
                                    <td><?=$sirano?></td>
                                    <td><?=$rs->name?></td>
                                    <td><?=$rs->subject?></td>
                                    <td><center><i class="fa <?=($rs->read==1)?"fa-check":"fa-times"?> fa-fw"></i></center></td>
                                    <td><center><i class="fa <?=($rs->cevap==null)?"fa-times":"fa-check"?> fa-fw"></i></center></td>
                                    <td><a href="<?=base_url()?>admin/home/mesajlar_ac/<?=$rs->id?>"><p class="btn btn-success " >AÇ</p></a></td>
                                    <td><a href="<?=base_url()?>admin/home/mesajlar_sil/<?=$rs->id?>" onclick="return confirm('Emin misiniz ?')"><p class="btn btn-warning " >SİL</p></a></td>
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