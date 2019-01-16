<?php 
    require_once __DIR__. "/autoload/autoload.php";
    if (!isset($_SESSION['name_user']))
    {
            echo "<script>alert('Bạn cần đăng nhập để có thể sửa thông tin sản phẩm!');location.href='dang-nhap.php'</script>";
    }
    
        $id = intval(getInput('id'));
        $sql = "SELECT * FROM offer WHERE offer.product_id = '".$id."'";
        $current_user = $db->fetchsql($sql);
        if ($current_user['0']['user_id'] != $_SESSION['name_id'])
        {
            echo "<script>alert('Bạn không có quyền chỉnh sửa sản phẩm này!');
            location.href='index.php';</script>";
        }
    
 ?>
<?php 
    require_once __DIR__. "/autoload/autoload.php";


    $id = intval(getInput('id'));

    $EditProduct = $db->fetchID("product",$id);
    if (empty($EditProduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirect("profile.php");
    }
    $category = $db->fetchAll("category");
    $product = $db->fetchAll("product");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name" => postInput('name'),
            "category_id" => postInput('category_id'),
            "description" => postInput('description')
        ];
        $error = [];
        if (postInput('name') == '')
        {
            $error['name'] = "Bạn cần nhập tên sản phẩm!";
        }
        if (postInput('category_id') == '')
        {
            $error['category_id'] = "Bạn cần chọn danh mục!";
        }
        if (! isset ($_FILES['thumbnail']))
        {
            $error['thumbnail'] = "Bạn cần đăng ảnh sản phẩm!";     
        }
        if (empty($error))
        {
            if (isset($_FILES['thumbnail']))
            {
                $file_name = $_FILES['thumbnail']['name'];
                $file_tmp = $_FILES['thumbnail']['tmp_name'];
                $file_type = $_FILES['thumbnail']['type'];
                $file_error = $_FILES['thumbnail']['error'];
                if ($file_error == 0)
                {
                    $part = ROOT."product/";
                    $data['thumbnail'] = $file_name;
                }
            }
            $update = $db->update("product",$data,array("id"=>$id));
            if ($update > 0)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Cập nhật thành công.";
                redirect('index.php');
            }
            else
            {
                $_SESSION['error'] = "Lỗi xảy ra khi cập nhật sản phẩm. Vui lòng thử lại.";
                redirect('index.php');
            }
        }

        }
    
 ?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
                    <!-- Nội dung bên trong website-->
                    <!-- Breadcrumbs-->
                     <div id="content-wrapper">

                        <div class="container-fluid col-md-8">
                            <!-- Page Content -->
                            <h1>Sửa sản phẩm</h1>
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
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="InputName" placeholder="Tên sản phẩm" name="name" value="<?php echo $EditProduct['name'] ?>">
                                    <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">- Chọn danh mục phù hợp với sản phẩm -</option>
                                        <?php foreach ($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>"
                                                <?php echo $EditProduct['category_id'] == $item['id'] 
                                                ? 'selected = "selected"' : '' ?>><?php echo $item['name'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($error['category_id'])): ?>
                                    <p class="text-danger"> <?php echo $error['category_id'] ?> </p>
                                <?php endif ?>
                                </div>
                                <div>
                                    <img src="<?php echo uploads() ?>product/<?php echo $EditProduct['thumbnail'] ?>" witdh="100px" height="100px">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" id="InputThumbnail" placeholder="Hình ảnh" name="thumbnail">
                                    <?php if (isset($error['thumbnail'])): ?>
                                    <p class="text-danger"> <?php echo $error['thumbnail'] ?> </p>
                                <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <textarea class="form-control" name="description" rows="5"><?php echo $EditProduct['description'] ?></textarea>
                                    <?php if (isset($error['description'])): ?>
                                    <p class="text-danger"> <?php echo $error['description'] ?> </p>
                                <?php endif ?>
                                </div>
                                <button type="submit" class="btn btn-warning">Lưu</button>
                            </form>
                        </div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>                