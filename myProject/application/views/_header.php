<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$veri[0]-> keywords?>">
    <meta name="keywords" content="<?=$veri[0]-> keywords?>">
    <meta name="author" content="">
    <title><?=$sayfa?><?=$veri[0]-> name?></title>
    <link href="<?=base_url()?>assets/admin/es/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/es/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/es/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/es/css/price-range.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/es/css/animate.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/admin/es/css/main.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/admin/es/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>assets/admin/es/js/html5shiv.js"></script>
    <script src="<?=base_url()?>assets/admin/es/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?=base_url()?>assets/admin/es/images/ico/logo_icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/admin/es/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/admin/es/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/admin/es/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/admin/es/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->


		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?=base_url()?>"><img src="<?=base_url()?>assets/admin/es/images/home/logo.png" alt="" width="230" height="40"/></a>
						</div>

					</div>
                    <div class="col-sm-4">
                        <marquee><b style="color: #fe980f"><?=$veri[0]->duyuru?></b></marquee>
                    </div>
                    <?php
                        $hesabim=null;
                        $sepetim=null;
                        $tamamla=null;
                        if($menu=="uye")
                            $hesabim="active";
                        elseif($menu=="sepetim")
                            $sepetim="active";
                        elseif($menu=="tamamla")
                            $tamamla="active";
                    ?>

					<div class="col-sm-4">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                <?php  if($this->session->userdata("user_session")){  ?>
                                        <li><a href="<?=base_url()?>uye/hesabim" class="<?=$hesabim?>"><i class="fa fa-user"></i><?= $this->session->user_session["username"]?></a></li>
                                        <li><a href="<?=base_url()?>uye/sepetim" class="<?=$sepetim?>"><i class="fa fa-shopping-cart"></i> Sepetim</a></li>
                                        <li><a href="<?=base_url()?>home/logout"><i class="fa fa-lock"></i> Çıkış Yap</a></li>
                                <?php } else {?>
                                        <li><a href="<?=base_url()?>home/login_sayfa"><i class="fa fa-lock"></i> Giriş Yap</a></li>
                                        <li><a href="<?=base_url()?>home/login_sayfa"><i class="fa fa-user"></i> Üye Ol</a></li>
                                <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
						
						<?php $anasayfa=null;
						 $anasayfa=null;
						 $hakkimizda=null;
						 $iletisim=null;
						 $bize_yazin=null;
						 $kampanyalar=null;
						 if($menu=="anasayfa")
							 $anasayfa="active";
						 else if($menu=="hakkimizda")
							 $hakkimizda="active";
						 else if($menu=="iletisim")
							 $iletisim="active";
						 else if($menu=="bize_yazin")
							 $bize_yazin="active";
						 else if($menu=="kampanyalar")
							 $kampanyalar="active";
						 ?>
						 
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?=base_url()?>" 				class="<?=$anasayfa?>">Anasayfa</a></li>
								<li><a href="<?=base_url()?>home/kampanyalar" class="<?=$kampanyalar?>">Kampanyalar</a></li>
								<li><a href="<?=base_url()?>home/hakkimizda" class="<?=$hakkimizda?>">Hakkımızda</a></li>
								<li><a href="<?=base_url()?>home/iletisim" class="<?=$iletisim?>">İletişim</a></li>
								<li><a href="<?=base_url()?>home/bize_yazin" class="<?=$bize_yazin?>">Bize Yazın</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
                            <form action="<?=base_url()?>home/arama" method="post">
							    <input type="text" name="arama" placeholder="Arama..." />
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->