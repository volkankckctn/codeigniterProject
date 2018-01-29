<div class="navbar-default sidebar" role="navigation" style="margin-top:70px">
    <div class="nav">
        <center>
            <img src="<?=base_url()?>assets/admin/img/<?= $this->session->admin_session["image"]?>" width="125" height="125  ">
        </center>
    </div>
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">

                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Arama...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="<?=base_url()?>admin"><i class="fa fa-home fa-fw"></i> Anasayfa</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/uyeler"><i class="fa  fa-user   fa-fw"></i> Üyeler</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/urunler"><i class="fa fa-tags fa-fw"></i> Ürünler</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/kategoriler"><i class="fa fa-sliders fa-fw"></i> Kategoriler</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-truck   fa-fw"></i> Siparişler<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url()?>admin/siparisler">Onaylanan ve Onay Bekleyen</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/siparisler/siparisler_kargodakiler">Kargodakiler</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/siparisler/siparisler_tamamlananlar" >Tamamlananlar</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/siparisler/siparisler_iptaller" >İptal Edilenler</a>
                    </li>
                </ul>
            </li>
			<li>
                <a href="<?=base_url()?>admin/home/mesajlar"><i class="fa fa-envelope fa-fw"></i> Mesajlar</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/home/yorumlar"><i class="fa fa-comment  fa-fw"></i> Yapılan Yorumlar</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/home/kampanya"><i class="fa fa-bomb fa-fw"></i> Kampanya Ürünleri</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/home/duyuru"><i class="fa fa-microphone fa-fw"></i> Duyuru Kontrol</a>
            </li>
            <li>
                <a href="<?=base_url()?>admin/home/ayarlar"><i class="fa fa-cogs fa-fw"></i> Ayarlar</a>
            </li>
        </ul>
    </div>
</div>
</nav>