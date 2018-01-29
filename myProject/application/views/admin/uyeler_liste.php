<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Üye Listesi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <h4 class="btn btn-info btn-xs">
                            <p class="fa fa-users"></p><a href="<?=base_url()?>admin/uyeler/ekle"><b > Üye Ekle </b></a>
                        </h4>
                        <div>
                            <P></P>
                            <P class="alert-danger"> <?= $this->session->flashdata("msj_delete");?></P>
                            <P class="alert-info"> <?= $this->session->flashdata("msj_insert");?></P>
                            <P class="alert-success"> <?= $this->session->flashdata("msj_guncelle");?></P>
                        </div>
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Adı Soyadı</th>
                                        <th>E-Mail</th>
                                        <th>Telefon</th>
                                        <th>Durum</th>
                                        <th>Yetki</th>
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
                                    <td><?=$rs->id?></td>
                                    <td><?=$rs->username?></td>
                                    <td><?=$rs->name?> <?=$rs->surname?></td>
                                    <td><?=$rs->email?></td>
                                    <td><?=$rs->tel?></td>
                                    <td>
                                        <?php
                                            if($rs->status=="1")echo "Aktif Kullanıcı";
                                            else echo "Pasif Kullanıcı";

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($rs->authorty=="1")echo "Admin";
                                            else echo "Üye";
                                        ?>
                                    </td>
                                    <td><a href="<?=base_url()?>admin/uyeler/duzenle/<?=$rs->id?>"><i class="btn btn-warning " > <i class="fa fa-edit"></i>Düzenle</i></a></td>
                                    <td><a href="<?=base_url()?>admin/uyeler/sil/<?=$rs->id?>" onclick="return confirm('Emin misiniz ?')"><i class="btn btn-danger"><i class="fa fa-times-circle"></i> Sil</i></a></td>
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