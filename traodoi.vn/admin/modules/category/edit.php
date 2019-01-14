<?php 
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";
    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID("category",$id);
    if (empty($EditCategory))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin("category");
    }
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
                if ($EditCategory['name'] != $data['name'])
                {
                    $isset = $db->fetchOne("category","name = '".$data['name']."'");
                    if (count($isset) > 0)
                    {
                        $_SESSION['error'] = "Danh mục đã tồn tại!";
                    }
                    else 
                    {
                        $id_update = $db->update("category",$data,array('id'=>$id));
                        if ($id_update > 0)
                        {
                            move_uploaded_file($file_tmp, $part.$file_name);
                            $_SESSION['success'] = "Cập nhật thành công.";
                            redirectAdmin("category");
                        }
                        else
                        {
                        $_SESSION['error'] = "Dữ liệu không thay đổi.";
                        redirectAdmin("category");
                        }
                    }
                }
                else
                {
                    $id_update = $db->update("category",$data,array('id'=>$id));
                        if ($id_update > 0)
                        {
                            move_uploaded_file($file_tmp, $part.$file_name);
                            $_SESSION['success'] = "Cập nhật thành công.";
                            redirectAdmin("category");
                        }
                        else
                        {
                        $_SESSION['error'] = "Dữ liệu không thay đổi.";
                        redirectAdmin("category");
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
                                    <a href="/../index.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo modules("category") ?>">Các danh mục (Category)</a>
                                </li>
                                <li class="breadcrumb-item active">Sửa</li>
                            </ol>
                            <!-- Page Content -->
                            <h1>Chỉnh sửa danh mục</h1>
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
                                    <input type="text" class="form-control" id="InputName" placeholder="Tên danh mục" name="name" value="<?php echo $EditCategory['name'] ?>">
                                </div>
                                <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                                <div>
                                    <img src="<?php echo uploads() ?>category/<?php echo $EditCategory['icon'] ?>" witdh="100px" height="100px">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh danh mục</label>
                                    <input type="file" class="form-control" id="InputIcon" placeholder="Hình ảnh" name="icon">
                                    <?php if (isset($error['icon'])): ?>
                                    <p class="text-danger"> <?php echo $error['icon'] ?> </p>
                                <?php endif ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>                