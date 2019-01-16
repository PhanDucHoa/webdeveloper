<?php 
    require_once __DIR__. "/../autoload/autoload.php";
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>1DOI1.VN | Admin</title>
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url() ?>/public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url() ?>/public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url() ?>/public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url() ?>/public/admin/css/sb-admin.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            <a class="navbar-brand mr-1" href="index.php">1DOI1.VN | Admin</a>
            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search -->
            <!-- Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href=""><?php echo $_SESSION['admin_name'] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/traodoivn/thoat.php">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/traodoivn/admin/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo modules("category") ?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Các danh mục</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo modules("product") ?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Các sản phẩm</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo modules("user") ?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Các thành viên</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo modules("admin") ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Quản trị viên</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo modules("report") ?>">
                    <i class="fas fa-fw fa-flag"></i>
                    <span>Báo cáo</span></a>
                </li>
            </ul>