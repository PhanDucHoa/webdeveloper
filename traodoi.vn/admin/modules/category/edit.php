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
        if (empty($error))
        {
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
                                    <a href="/../index.html">Dashboard</a>
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
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="InputName" placeholder="Tên danh mục" name="name" value="<?php echo $EditCategory['name'] ?>">
                                </div>
                                <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>                