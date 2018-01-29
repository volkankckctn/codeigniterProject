

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12"><br><br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Duyuru Ayarları <b class="alert-success"><?=$this->session->flashdata("msj");?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <form action="<?=base_url()?>admin/home/duyuru_guncelle/<?=$veri[0]->id?>" method="post">
                            <div class="panel-body">
                                <label class="control-label col-sm-2">Duyuru:</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" name="duyuru" rows="3"><?=$veri[0]->duyuru?></textarea><br>
                                    <center><input class="btn btn-success" type="submit" value="Güncelle"/></center>
                                </div>
                            </div>
                        </form>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>