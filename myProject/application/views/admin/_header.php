<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel | Volcanikdaglar.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>assets/admin/img/logo_icon.png"><!-- Sayfa ikonu(favicon) alındı -->

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="<?=base_url()?>assets/admin/vendor/ckeditor/ckeditor.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?=base_url()?>admin">
                <img width="225" height="45" hspace="20" vspace="10" src="<?=base_url()?>assets/admin/img/logo.png"/>
            </a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img hspace="2" width="35" height="35" src="<?=base_url()?>assets/admin/img/<?= $this->session->admin_session["image"]?>"/>
                    <b><?= $this->session->admin_session["username"]?></b>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?=base_url()?>admin/home/ayarlar"><i class="fa fa-gear fa-fw"></i> Ayarlarım</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url()?>admin/login/login_out"><i class="fa fa-sign-out fa-fw"></i>Çıkış Yap</a>
                    </li>
                </ul>
            </li>
        </ul>