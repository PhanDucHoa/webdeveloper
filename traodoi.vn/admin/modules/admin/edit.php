<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
        $open = "admin";
        $id = intval(getInput('id'));

        $EditAdmin = $db->fetchID("admin",$id);
        if (empty($EditAdmin))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin("admin");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name" => postInput('name'),
            "email" => postInput('email'),
            "password" => MD5(postInput('password')),
            "rank" => postInput('rank')
        ];
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
            if (postInput('email') != $EditAdmin['email'])
            {
                $is_check = $db->fetchOne("admin","email = '".$data['email']."'");
                if ($is_check != NULL)
                {
                    $error['email'] = "Email đã tồn tại!";
                }
            }
        }
        if (postInput('password') == '')
        {
            $error['password'] = "Bạn cần nhập mật khẩu!";     
        }
        if (postInput('password') != NULL && postInput('re_password') != NULL)
            {
                if (postInput('password') != postInput('re_password'))
                {
                    $error['re_password'] = "Mật khẩu thay đổi cần trùng khớp nhau!";
                }
                else 
                {
                    $data['password'] = MD5(postInput('password'));
                }
            }
        if (empty($error))
        {

            $id_update = $db->update("admin",$data,array("id"=>$id));
            if ($id_update > 0)
            {
                $_SESSION['success'] = "Cập nhật thành công.";
                redirectAdmin('admin');
            }
            else
            {
                $_SESSION['error'] = "Lỗi xảy ra khi cập nhật admin. Vui lòng thử lại.";
                redirectAdmin('admin');
            }


        }
    }
 ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Nội dung bên trong website-->
                    <!-- Breadcrumbs-->
                     <div id="content-wrapper">

                        <div class="container-fluid">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/traodoivn/admin/">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo modules("admin") ?>">Quản lý Admin</a>
                                </li>
                                <li class="breadcrumb-item active">Sửa</li>
                            </ol>
                            <!-- Page Content -->
                            <h1>Sửa Admin</h1>
                            <hr>
                            <div class="clearfix"></div>
                            <?php if (isset($_SESSION['error'])) :?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên người dùng (Admin)</label>
                                    <input type="text" class="form-control" id="InputName" placeholder="Tên admin" name="name" value="<?php echo $EditAdmin['name'] ?>">
                                    <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="InputEmail" placeholder="Email" name="email" value="<?php echo $EditAdmin['email'] ?>">
                                    <?php if (isset($error['email'])): ?>
                                    <p class="text-danger"> <?php echo $error['email'] ?> </p>
                                <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password" class="form-control" id="InputPassword" placeholder="********" name="password">
                                    <?php if (isset($error['password'])): ?>
                                    <p class="text-danger"> <?php echo $error['password'] ?> </p>
                                <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="InputRe_Password" placeholder="********" name="re_password">
                                    <?php if (isset($error['re_password'])): ?>
                                    <p class="text-danger"> <?php echo $error['re_password'] ?> </p>
                                <?php endif ?>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Cấp bậc</label>
                                    <select class="form-control" name="rank">
                                        <option value="1" <?php echo isset($data['rank']) && $data['rank'] == 1 ? "selected = 'selected'" : '' ?>>Admin</option>
                                        <option value="2" <?php echo isset($data['rank']) && $data['rank'] == 2 ? 'selected = "selected"' : '' ?>>Moderator</option>
                                    </select>
                                    <?php if (isset($error['rank'])): ?>
                                    <p class="text-danger"> <?php echo $error['rank'] ?> </p>
                                <?php endif ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>                