<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->fetch('title') ?></title>

  <?= $this->Html->css([
    "/plugins/fontawesome-free/css/all.min.css",
    "/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css",
    "/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
    "/plugins/jqvmap/jqvmap.min.css",
    "/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
    "/plugins/daterangepicker/daterangepicker.css",
    "/plugins/summernote/summernote-bs4.min.css",
    "/dist/css/adminlte.min.css",
  ]) ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <?= $this->fetch('TopStyleLinks') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?= $this->element('top-nav') ?>

    <?= $this->element('left-sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; <?php echo date('Y') ?>.</strong>
      All rights reserved by Phongdeptrai.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <?= $this->Html->script([
    "/plugins/jquery/jquery.min.js",
    "/plugins/jquery-ui/jquery-ui.min.js",
    "/plugins/bootstrap/js/bootstrap.bundle.min.js",
    "/plugins/chart.js/Chart.min.js",
    "/plugins/sparklines/sparkline.js",
    "/plugins/jqvmap/jquery.vmap.min.js",
    "/plugins/jqvmap/maps/jquery.vmap.usa.js",
    "/plugins/jquery-knob/jquery.knob.min.js",
    "/plugins/daterangepicker/daterangepicker.js",
    // "/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
    "/plugins/summernote/summernote-bs4.min.js",
    "/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
    "/dist/js/adminlte.js",
    "/dist/js/demo.js",
    // "/dist/js/pages/dashboard.js",
  ]) ?>

  <?= $this->fetch('bottomScriptLinks') ?>
  <?= $this->fetch('script') ?>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
</body>

</html>