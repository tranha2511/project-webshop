<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $this->page_title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php
$username = '';
$avatar = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $jobs = $_SESSION['user'];
    $avatar = $_SESSION['user']['avatar'];
    $year = date('Y', strtotime($_SESSION['user']['created_at']));
}

?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center logo-load">
    <img class="animation__wobble" src="assets/img/TrnHa-store.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-left">
    <!-- Brand Logo -->
    <a href="index.php?controller=home&action=index" class="brand-link">
      <img src="assets/img/TrnHa-store.png" alt="TrnHaStore Logo" class="brand-image img-circle elevation-3" style="opacity: .8; height:50px; line-height: 30px">
      <span class="brand-text font-weight-light">TrnHa Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="display: block">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex left-user" style="line-height: 95px; height: 95px;">
        <div class="image left-user-img" style="width: 30%">
          <img src="assets/img/uploads/users/<?php echo $avatar ?>" class="img-circle elevation-2" alt="User Image" style="width:76%">
        </div>
        <div class="info left-user-info">
          <span><?php echo $username ?></span>
        </div>
      </div>
      <div class="logout">
      <a href="index.php?controller=user&action=logout" style="font-size: 15px">Đăng xuất</a>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php?controller=category&action=index" class="nav-link a-nav-link">
              <p>
                Danh mục sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=product&action=index" class="nav-link a-nav-link">
              <p>
                Danh sách sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=product&action=index" class="nav-link a-nav-link">
              <p>
                Danh sách sản phẩm mới
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=banner&action=index" class="nav-link a-nav-link">
              <p>
                Danh sách banner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=new&action=index" class="nav-link a-nav-link">
              <p>
                Danh sách tin tức
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=user&action=index" class="nav-link a-nav-link">
              <p>
                Danh sách người dùng
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper container-product">   
        <?php echo $this->content; ?>
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="assets/js/jquery.mousewheel.js"></script>
<script src="assets/js/raphael.min.js"></script>
<script src="assets/js/jquery.mapael.min.js"></script>
<script src="assets/js/usa_states.min.js"></script> ChartJS -->
<!-- <script src="assets/js/Chart.min.js"></script> -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/js/pages/dashboard2.js"></script> -->
<script src="assets/js/banner.js"></script>
<script src="assets/js/hammers.js"></script>
</body>
</html>
