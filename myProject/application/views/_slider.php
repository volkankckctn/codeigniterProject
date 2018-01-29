<section id="slider"><!--slider-->
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/es/slider/css/my-slider.css"/>
    <script src="<?=base_url()?>assets/admin/es/slider/js/ism-2.2.min.js"></script>

        <div class="ism-slider" data-transition_type="zoom" data-play_type="once" data-image_fx="zoomrotate" id="my-slider">
            <ol>
                <?php foreach ($kampanya as $rs){ ?>
                    <li>
                        <a href="<?=base_url()?>home/urun_detay_sayfa/<?=$rs->id?>">
                            <img src="<?=base_url()?>uploads/<?=$rs->preview_img?>">
                            <div class="ism-caption ism-caption-0"><?=$rs->name?></div>
                        </a>
                    </li>
                <?php }?>
            </ol>
        </div>
</section><!--/slider-->

