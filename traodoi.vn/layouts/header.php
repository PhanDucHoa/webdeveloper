<?php require_once __DIR__. "/../autoload/autoload.php"; 
$user_id = '';
if (isset($_SESSION['name_id']))
{
  $user_id = $_SESSION['name_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- meta title -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>1DOI1.VN</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>public/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo base_url() ?>public/frontend/css/homepage1.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>public/frontend/css/custom.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->

  <div class="homepage-size">
    <div class="header-top">
      <div>
        <a href="index.php">
        <img class="img-1doi1-logo trackable" src="<?php echo base_url() ?>public/frontend/image/logo.jpg" width="300 " alt="Trang Web Trao Đổi Hàng Hóa Đầu Tiên Trên Toàn Quốc - 1DOI1"
          title="Trang Web Trao Đổi Hàng Hóa Đầu Tiên Trên Toàn Quốc - 1DOI1" data-event_type="view" data-event_name="1DOI1 Logo (Homepage 2018)"
          data-xtn2="91" data-page_name="1DOI1 Logo (Homepage 2018)">
        </a>
      </div>
      <div class="header-menus">
        <div class="header-menu">
          <a href="" class="trackable" data-event_type="link" data-event_name="Header (Homepage 2018)" data-xtn2="91"
            data-page_name="Header (Homepage 2018)::Tim Mon Hang" data-click_type="A">Tìm Hàng</a>
        </div>

        <?php if (isset($_SESSION['name_user'])): ?>
          <div class="header-menu">
          <a href="thong-tin-user.php" id="btn-login" tabindex="0" role="button" class="trackable" data-event_type="link" data-event_name="Header (Homepage 2018)"
            data-xtn2="91" data-page_name="Header (Homepage 2018)::Login" data-click_type="A">Tài khoản: <?php echo $_SESSION['name_user'] ?></a>
        </div>

        <div class="header-menu">
          <a href="thoat.php" id="btn-login" tabindex="0" role="button" class="trackable" data-event_type="link" data-event_name="Header (Homepage 2018)"
            data-xtn2="91" data-page_name="Header (Homepage 2018)::Login" data-click_type="A">Thoát</a>
        </div>
        <?php else: ?>
          
          <div class="header-menu">
          <a href="dang-nhap.php" id="btn-login" tabindex="0" role="button" class="trackable" data-event_type="link" data-event_name="Header (Homepage 2018)"
            data-xtn2="91" data-page_name="Header (Homepage 2018)::Login" data-click_type="A">Đăng Nhập</a>
        </div>

        <div class="header-menu">
          <a href="dang-ki.php" id="btn-login" tabindex="0" role="button" class="trackable" data-event_type="link" data-event_name="Header (Homepage 2018)"
            data-xtn2="91" data-page_name="Header (Homepage 2018)::Login" data-click_type="A">Đăng Kí</a>
        </div>

        <?php endif ;?>

        <div class="appWrapper-Header-navItem">
          <a class="appWrapper-Header-primaryButton" href="tao-offer.php?id=<?php echo $user_id ?>">Đăng Tin</a>
        </div>
      </div>
    </div>

  </div><br>