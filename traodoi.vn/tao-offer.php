<?php 
	require_once __DIR__. "/autoload/autoload.php";
	if (!isset($_SESSION['name_user']))
	{
            echo "<script>alert('Bạn cần đăng nhập để có thể đăng tin!');location.href='dang-nhap.php'</script>";
	}
 ?>
 <?php require_once __DIR__. "/layouts/header.php"; ?> 
 <?php 
 require_once __DIR__. "/autoload/autoload.php";
 	$id = intval(getInput('id'));
    $category = $db->fetchAll("category");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data_product = 
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
                    $data_product['thumbnail'] = $file_name;
                }
            }
            $id_insert = $db->insert("product",$data_product);
            if ($id_insert)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $id_product = $db->fetchOne("product", "name = '".$data_product['name']."'");
                $data_offer =
                [
                	"user_id" => $id,
                	"product_id" => $id_product['id']

                ];
                $id_offer_insert = $db->insert("offer",$data_offer);
                $_SESSION['success'] = "Thêm mới thành công.";
                redirect('index.php');
            }
            else
            {
                $_SESSION['error'] = "Lỗi xảy ra khi thêm mới sản phẩm. Vui lòng thử lại.";
                redirect('index.php');
            }


        }
    }
 ?>
                    <!-- Nội dung bên trong website-->
                    <!-- Breadcrumbs-->
                     <div id="content-wrapper">

                        <div class="container-fluid col-md-8">
                            <!-- Page Content -->
                            <h1>Đăng tải sản phẩm của bạn</h1>
                            <p>Cung cấp thông tin chính xác để người dùng dễ dàng tìm thấy sản phẩm của bạn.</p>
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
                                    <input type="text" class="form-control" id="InputName" placeholder="Tên sản phẩm" name="name">
                                    <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">- Chọn danh mục phù hợp với sản phẩm -</option>
                                        <?php foreach ($category as $item):?>
                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($error['category_id'])): ?>
                                    <p class="text-danger"> <?php echo $error['category_id'] ?> </p>
                                <?php endif ?>
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
                                    <textarea class="form-control" name="description" rows="5"></textarea>
                                    <?php if (isset($error['description'])): ?>
                                    <p class="text-danger"> <?php echo $error['description'] ?> </p>
                                <?php endif ?>
                                </div>
                                <button type="submit" class="btn btn-warning">Đăng tải</button>
                            </form>
                        </div>               

 <?php require_once __DIR__. "/layouts/footer.php"; ?> 