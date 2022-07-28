<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MANAGER ALPHATECH | <?=$pagetitle?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">  
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>"> 
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>" >
  <?php 
if(isset($css_add) && is_array($css_add)){
    foreach($css_add AS $css){
        echo $css;
    }
}else{
  echo (isset($css_add) && ($css_add != "") ? $css_add : ""); 
}  
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <?php
        $orderbaru = $this->oitoclib->get_new_order_reg();
        $orderpoinbaru = $this->oitoclib->get_new_order_poin();
        $regantrian = $this->oitoclib->get_reg_antrian();

        $totalwarning = $orderbaru + $orderpoinbaru + $regantrian;
        ?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?=$totalwarning?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?=site_url('order')?>" class="dropdown-item"><i class="fas fa-money-bill-wave mr-2"></i> <?=$orderbaru?> Order Baru</a>
          <a href="<?=site_url('orderpoin')?>" class="dropdown-item"><i class="fas fa-money-bill-wave mr-2"></i> <?=$orderpoinbaru?> Order Baru</a>
          <a href="<?=site_url('members/antrian_pendaftaran_dropshiper')?>" class="dropdown-item"><i class="fas fa-user mr-2"></i> <?=$regantrian?> Pendaftar Dropshiper Baru</a>
        </div>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user"></i>
              <?php echo $this->session->userdata('username'); ?>
              <span><i class="caret"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="<?php echo site_url('profile'); ?>" class="dropdown-item">
                  <i class='fa fa-user'></i> Profile</a>
              <a href="<?php echo site_url('auth/login_ctl/logout'); ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link">
      <img src="<?php echo base_url('assets/img/gabsgabrielle.jpg'); ?>" alt="OITOC" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GABRIELLE JEANS</span>
    </a>
