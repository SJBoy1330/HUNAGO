<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hunago">
    <meta name="author" content="Hunago">
    <title>HUNAGO | <?= $pagetitle; ?></title>

    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.svg') ?>">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link href="<?= base_url("assets/vendor/bootstrap-5/css/bootstrap.min.css") ?>" rel="stylesheet">

    <link href="<?= base_url("assets/vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/vendor/rocket-loader/css/loader.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css/osahan.css") ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/vendor/owl-carousel/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/owl-carousel/owl.theme.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a2309adc07.js" crossorigin="anonymous"></script>

    <style>
        button.swal2-confirm {
            background-color: #3E64E7;
            border: none;
            padding: 10px;
            font-size: 18px;
            width: 120px;
            color: #FFFFFF;
            font-weight: 500;
            border-radius: 5px;
        }

        button.swal2-confirm:hover {
            background-color: transparent;
            border: 2px solid #3E64E7;
            color: #3E64E7;
            transition: 0.5s;
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>

    <?php
    if (isset($css_add) && is_array($css_add)) {
        foreach ($css_add as $css) {
            echo $css;
        }
    } else {
        echo (isset($css_add) && ($css_add != "") ? $css_add : "");
    }
    ?>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top justify-content-between py-2 px-3">
        <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0 d-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand mr-1" href="<?= site_url() ?>"><img class="img-fluid" alt="" src="<?= base_url('assets/img/logo_2.svg') ?>" width="125"></a>

        <form class="d-none d-md-inline-block form-inline mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Telusuri..." style="width:538px; color: #FFFFFF;">
                <div class="input-group-append">
                    <button class="btn btn-light" type="button">
                        <i class="fas fa-search" style="color: #828282 !important;"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav osahan-right-navbar">
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
                <?php if ($this->session->userdata('id_user')) : ?>
                    <a class="nav-link dropdown-toggle user-dropdown-link" href="#" role="button">
                        <img alt="Avatar" src="<?= base_url("assets/img/user.png") ?>">
                        Osahan
                    </a>
                <?php else : ?>
                    <button type="button" class="btn btn-login" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">
                        <i class="fa-regular fa-circle-user"></i><span style="margin-left: 5px;">Login</span>
                    </button>
                <?php endif; ?>
            </li>
        </ul>
    </nav>