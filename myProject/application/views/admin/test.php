

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php
                for($i=0;$i<36;$i++){
                    if($urun_dizi[$i]->parent_id==0)
                        echo $urun_dizi[$i]->name ;
                }
                ?>
            </div>
        </div>
    </div>
</div>