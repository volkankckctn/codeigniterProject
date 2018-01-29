<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Yapılan Yorumlar
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
                                    <th>#</th>
                                    <th>Ürün İsmi</th>
                                    <th>Yorum Yapan</th>
                                    <th width="400">Yorum</th>
									<th><center>Sil</center></th>
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
                                    <td><?=$rs->p_name?></td>
                                    <td><?=$rs->name?> <?=$rs->surname?></td>
                                    <td><?=$rs->comment?></td>
                                    <td><center><a href="<?=base_url()?>admin/home/yorumlar_sil/<?=$rs->id?>" onclick="return confirm('Emin misiniz ?')"><b class="text-danger">Sil</b></a> </center></td>
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