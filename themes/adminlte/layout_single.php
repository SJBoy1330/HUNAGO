<?php include_once('header.php'); ?>
<?php include_once('sidemenu.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($pagetitle) && $pagetitle != "") ? $pagetitle : ""; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php echo (isset($breadcrumb) && $breadcrumb != "" ) ? $breadcrumb : ""; ?>
                <?php /// isian breadcrumb formatnya : 
                /*  gunanya breadcrumb untuk mempermudah navigasi
                *  <li class="breadcrumb-item"><a href="#">Contoh 1</a></li>
                *  <li class="breadcrumb-item"><a href="#">Contoh 2</a></li>
                */ 
                ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <?php echo $content; ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php include_once('footer.php');