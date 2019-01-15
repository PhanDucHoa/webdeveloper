<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];
        $error = [];
        if (postInput('name') == '')
        {
            $error['name'] = "Bạn cần nhập đầy đủ các danh mục!";
        }
        if (! isset ($_FILES['icon']))
        {
            $error['icon'] = "Bạn cần đăng ảnh đại diện danh mục!";     
        }
        if (empty($error))
        {
            if (isset($_FILES['icon']))
            {
                $file_name = $_FILES['icon']['name'];
                $file_tmp = $_FILES['icon']['tmp_name'];
                $file_type = $_FILES['icon']['type'];
                $file_error = $_FILES['icon']['error'];
                if ($file_error == 0)
                {
                    $part = ROOT."category/";
                    $data['icon'] = $file_name;
                }
            }
            $isset = $db->fetchOne("category","name = '".$data['name']."'");
            if (count($isset) > 0)
            {
                $_SESSION['error'] = "Danh mục đã tồn tại!";
            }
            else 
            {
                $id_insert = $db->insert("category",$data);
                if ($id_insert > 0)
                    {
                        move_uploaded_file($file_tmp, $part.$file_name);
                        $_SESSION['success'] = "Thêm mới thành công.";
                        redirectAdmin("category");
                    }
                else
                    {
                $_SESSION['error'] = "Có lỗi xảy ra. Vui lòng thử lại.";
                    }
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
                                    <a href="<?php echo modules("category") ?>">Các danh mục (Category)</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm mới</li>
                            </ol>
                            <!-- Page Content -->
                            <h1>Thêm mới danh mục</h1>
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
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="InputName" placeholder="Tên danh mục" name="name">
                                </div>
                                <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh danh mục</label>
                                    <input type="file" class="form-control" id="InputIcon" placeholder="Hình ảnh" name="icon">
                                    <?php if (isset($error['icon'])): ?>
                                    <p class="text-danger"> <?php echo $error['icon'] ?> </p>
                                <?php endif ?>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>                