<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Kategoriler</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php $i=0; foreach($cat as $rs) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#<?=$rs->id?>">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            <?=$rs->name?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?=$rs->id?>" class="panel-collapse collapse" style="height: auto;">
                                    <div class="panel-body">
                                        <?php foreach ($cat[$i]->sub as $x){ ?>
                                            <ul>
                                                <a style="color: #696763" href="<?=base_url()?>home/categories/<?=$x->id?>"><?=$x->name?></a>
                                            </ul>
                                        <?php } $i++; ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div><!--/category-products-->
                    <div class="price-range" ><!--price-range-->
                        <h2>Fiyat Aralığı</h2>
                        <div class="well text-center">
                            <form action="<?=base_url()?>home/filtre" method="post">
                                <input name="aralik" data-slider-min="0" data-slider-max="500" data-slider-step="1" data-slider-value="[300,450]" id="sl2" ><br />
                                <b class="pull-left">₺ 0</b> <b class="pull-right">₺ 500</b>
                                <input class="text-success btn-block cart left-round" type="submit" value="Filtrele">
                            </form>
                        </div>
                    </div><!--/price-range-->
                </div>
            </div>