<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <p></p>
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Kampanya Ürünleri
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div>
                            <P></P>
                            <P class="alert-info"> <?= $this->session->flashdata("msj_delete");?></P>
                            <P class="alert-success"> <?= $this->session->flashdata("msj");?></P>
                        </div>
                        <div class="table-responsive table-bordered">
                            <br>
                            &ensp;<p class="fa fa-tags"></p><a href="<?=base_url()?>admin/home/kampanya_ekle_sayfa/"><b> Kampanyalı Ürün Ekle </b></a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><center>Ürün ID</center></th>
                                        <th><center>Ürün Adı</center></th>
                                        <th><center>Kampanyadan Sil</center></th>
                                    </tr>
                                </thead>
                                <?php foreach ($veri as $rs){
                                    if($rs->grup=="kampanya"){
                                        ?>
                                        <tr>
                                            <td><center><?=$rs->id?></center></td>
                                            <td><center><?=$rs->name?></center></td>
                                            <td><center><a href="<?=base_url()?>admin/home/kampanya_sil/<?=$rs->id?>" onclick="return confirm('Emin misiniz ?')"> Sil</i></a></center></td>
                                        </tr>
                                <?php }} ?>
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