<?php 
	require_once __DIR__. "/autoload/autoload.php";

	$data = 
        [
            "email" => postInput('email'),
            "password" => postInput('password')
        ];

	$error = [];
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (postInput('email') == '')
        {
            $error['email'] = "Bạn cần nhập email!";
        }
        if (postInput('password') == '')
        {
            $error['password'] = "Bạn cần nhập mật khẩu!";     
        }
        if (empty($error))
        {
        	$is_check = $db->fetchOne("user","email = '".$data['email']."' AND password = '".MD5($data['password'])."'");
        	if ($is_check != NULL)
        	{
        		$_SESSION['name_user'] = $is_check['name'];
        		$_SESSION['name_id'] = $is_check['id'];
        		echo "<script>alert('Đăng nhập thành công.');location.href='index.php'</script>";
        	}
        	else
        	{
        		$_SESSION['error'] = "Email hoặc mật khẩu không chính xác. Vui lòng đăng nhập lại.";
        		redirect('dang-nhap');
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
   <h2>Đăng Nhập</h2>
   <p>Tiền email đăng nhập và mật khẩu</p>
   <?php require_once __DIR__. "/partials/notifications.php" ?>
   </div>
    <form action="" method="POST" id="Login">

        <div class="form-group">


            <input type="email" class="form-control" id="inputEmail" placeholder="Email đăng nhập" name="email">
            <?php if (isset($error['email'])): ?>
                                    <p class="text-danger"> <?php echo $error['email'] ?> </p>
                                <?php endif ?>

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu" name="password">
            <?php if (isset($error['password'])): ?>
                   <p class="text-danger"> <?php echo $error['password'] ?> </p>
            	<?php endif ?>

        </div>
        <div class="forgot">
</div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>

    </form>
    </div>
</div></div></div>


</body>
</html>


<?php require_once __DIR__. "/layouts/footer.php"; ?> 