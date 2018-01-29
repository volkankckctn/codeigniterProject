<div id="page-wrapper">
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Kampanyaya Ekleyeceğiniz Ürünü Seçin
                </div>

                <form class="form-horizontal" action="<?=base_url()?>admin/home/kampanya_ekle" method="post">
                    <div class="form-group">
                        <br><br><label class="control-label col-sm-2">Ürün Adı:</b></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="kampanya">
                                <?php
                                    foreach ($veri as $rs){
                                        if($rs->grup !="kampanya"){
                                            ?>
                                            <option><?=$rs->name?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Kampanyalarıma Ekle</button>
                        </div>
                    </div>



                </form>

            </div>
        </div>
    </div>
</div>