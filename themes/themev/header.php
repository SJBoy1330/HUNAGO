<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Hunago">
        <meta name="author" content="Hunago">
        <title>HUNAGO | Video yang Anda butuhkan</title>

        <link rel="icon" type="image/png" href="<?=base_url('assets/img/favicon.png')?>">

        <link href="<?=base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet">

        <link href="<?=base_url("assets/vendor/fontawesome-free/css/all.min.css")?>" rel="stylesheet" type="text/css">
        <link href="<?=base_url("assets/vendor/rocket-loader/css/loader.min.css")?>" rel="stylesheet" type="text/css">
        <link href="<?=base_url("assets/css/osahan.css")?>" rel="stylesheet">

        <link rel="stylesheet" href="<?=base_url('assets/vendor/owl-carousel/owl.carousel.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/vendor/owl-carousel/owl.theme.css')?>">
    </head>
<body id="page-top">
    <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
&nbsp;&nbsp;
        <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button> &nbsp;&nbsp;
        <a class="navbar-brand mr-1" href="<?=site_url()?>"><img class="img-fluid" alt="" src="<?=base_url('assets/img/logo.png')?>"></a>

<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <div class="input-group-append">
            <button class="btn btn-light" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>

<ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
    <!-- <li class="nav-item mx-1">
        <a class="nav-link" href="<?=site_url('video/upload')?>">
            <i class="fas fa-plus-circle fa-fw"></i> Tambah Video
        </a>
    </li> -->
    <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
        <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img alt="Avatar" src="<?=base_url("assets/img/user.png")?>">
            Osahan
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-video"></i> &nbsp; Subscriptions</a>
            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
        </div>
    </li>
</ul>
    </nav>