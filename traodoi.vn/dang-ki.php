<?php 
	require_once __DIR__. "/autoload/autoload.php";
	if(isset($_SESSION["name_id"]))
	{
		echo "<script>alert('Bạn đã có tài khoản!');location.href='index.php'</script>";
	}

	        $open = "admin";
        $data = 
        [
            "name" => postInput('name'),
            "email" => postInput('email'),
            "phone" => postInput('phone'),
            "address" => postInput('address'),
            "password" => MD5(postInput('password'))
        ];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];
        if (postInput('name') == '')
        {
            $error['name'] = "Bạn cần nhập tên admin!";
        }
        if (postInput('email') == '')
        {
            $error['email'] = "Bạn cần nhập email!";
        }
        else 
        {
            $is_check = $db->fetchOne("user","email = '".$data['email']."'");
            if ($is_check != NULL)
            {
                $error['email'] = "Email đã tồn tại!";
            }
        }
        if (postInput('phone') == '')
        {
            $error['phone'] = "Bạn cần nhập số điện thoại!";
        }
        if (postInput('address') == '')
        {
            $error['address'] = "Bạn cần nhập địa chỉ!";
        }
        if (postInput('password') == '')
        {
            $error['password'] = "Bạn cần nhập mật khẩu!";     
        }
        if ($data['password'] != MD5(postInput('re_password')))
        {
            $error['re_password'] = "Mật khẩu cần trùng khớp nhau!";
        }
        if (empty($error))
        {
           $id_insert = $db->insert("user",$data);
            if ($id_insert)
            {
                $_SESSION['success'] = "Đăng kí thành công.";
                redirect('dang-nhap');
            }
            else
            {
                $_SESSION['error'] = "Lỗi xảy ra khi đăng kí. Vui lòng thử lại.";
                redirect('dang-ki');
            }

        }

    }
 ?>


<?php require_once __DIR__. "/layouts/header.php"; ?> 

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<div class="login-form">
<div class="main-div border border-warning"">
    <div class="panel">
   <h2>Đăng Kí</h2>
    <?php require_once __DIR__. "/partials/notifications.php" ?>
   <p>Tiền đầy đủ các thông tin cần thiết</p>
   </div>
    <form action="" method="POST" id="Register">

        <div class="form-group">

            <input type="text" class="form-control" id="inputUsername" placeholder="Tên người dùng"  name="name" value="<?php echo $data['name'] ?>">
                                    <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
        </div>

        <div class="form-group">

            <input type="email" class="form-control" id="inputEmail" placeholder="Email"  name="email" value="<?php echo $data['email'] ?>">
                                    <?php if (isset($error['email'])): ?>
                                    <p class="text-danger"> <?php echo $error['email'] ?> </p>
                                <?php endif ?>
        </div>

        <div class="form-group">

            <input type="text" class="form-control" id="inputPhone" placeholder="Số điện thoại"  name="phone" value="<?php echo $data['phone'] ?>">
                                    <?php if (isset($error['phone'])): ?>
                                    <p class="text-danger"> <?php echo $error['phone'] ?> </p>
                                <?php endif ?>

        </div>

        <div class="form-group">

            <input type="text" class="form-control" id="inputAddress" placeholder="Địa chỉ"  name="address" value="<?php echo $data['address'] ?>">
                                    <?php if (isset($error['address'])): ?>
                                    <p class="text-danger"> <?php echo $error['address'] ?> </p>
                                <?php endif ?>

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu" name="password">
			<?php if (isset($error['password'])): ?>
                   <p class="text-danger"> <?php echo $error['password'] ?> </p>
            	<?php endif ?>
        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputRePassword" placeholder="Nhập lại Mật khẩu" name="re_password">
			<?php if (isset($error['re_password'])): ?>
                   <p class="text-danger"> <?php echo $error['re_password'] ?> </p>
            	<?php endif ?>
        </div>
        <div class="forgot">
</div>
        <button type="submit" class="btn btn-primary">Đăng kí</button>

    </form>
    </div>
</div></div></div>


</body>
</html>


<?php require_once __DIR__. "/layouts/footer.php"; ?> 

