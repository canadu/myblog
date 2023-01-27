<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="/css/adminlte.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= $base_url; ?>/admin/dashboard" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Brand Logo -->
      <a href="<?= $base_url; ?>/admin/dashboard" class="brand-link">
        <img src="/img/logo.png" alt="my-blog" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/img/user.svg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?= $base_url; ?>/admin/update_profile" class="d-block"><?= $admin['name']; ?></a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="nav-item">
              <a href="<?php echo $base_url; ?>/admin/dashboard" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  ホーム
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_url; ?>/admin/add_posts" class="nav-link">
                <i class="nav-icon fa-regular fa-pen-to-square"></i>
                <p>
                  投稿
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_url; ?>/admin/view_posts" class="nav-link">
                <i class="nav-icon fa-regular fa-rectangle-list"></i>
                <p>
                  閲覧
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_url; ?>/admin/admin_accounts" class="nav-link">
                <i class="nav-icon fa-solid fa-user-group"></i>
                <p>
                  アカウント
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_url; ?>/admin/admin_login" class="nav-link">
                <i class="nav-icon fa-solid fa-right-to-bracket"></i>
                <p>
                  ログイン
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_url; ?>/admin/admin_register" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                <p>
                  管理者登録
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- ======================================================================================== -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title  ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= $base_url; ?>/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <?php if (isset($errors) && count($errors) > 0) : ?>
        <?= $this->render('errors', array('errors' => $errors)); ?>
      <?php endif; ?>
      <?= $_content  ?>
    </div>
    <!-- ======================================================================================== -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020-2023 <a href="<?php echo $base_url; ?>">myblog</a>.</strong> All rights reserved.
    </footer>

  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED SCRIPTS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="../../js/adminlte.js"></script>
  <script src="../../js/admin_script.js"></script>
</body>

</html>