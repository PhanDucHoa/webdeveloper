<?php 
	require_once __DIR__. "/autoload/autoload.php";
	if (!isset($_SESSION['name_user']))
	{
            echo "<script>alert('Bạn cần đăng nhập để có thể gửi báo cáo!');location.href='dang-nhap.php'</script>";
	}
 ?>
 <?php require_once __DIR__. "/layouts/header.php"; ?> 
 <?php 
 require_once __DIR__. "/autoload/autoload.php";
 	$id = intval(getInput('id'));
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data_report = 
        [
            "description" => postInput('description')
        ];

        $error = [];
        if (postInput('description') == '')
        {
            $error['name'] = "Bạn cần nhập nội dung báo cáo!";
        }
        if (empty($error))
        {
            $id_product = $id;
                $data_report =
                [
                    "user_id" => $_SESSION['name_id'],
                    "product_id" => $id_product,
                    "description" => postInput('description')
                ];
            $id_report_insert = $db->insert("report",$data_report);
            if ($id_report_insert)
            {
                $_SESSION['success'] = "Báo cáo sản phẩm thành công.";
                redirect('index.php');
            }
            else
            {
                $_SESSION['error'] = "Lỗi xảy ra khi báo cáo sản phẩm. Vui lòng thử lại.";
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
                            <h1>Báo cáo sản phẩm</h1>
                            <p>Cung cấp thông tin chính xác để admin dễ dàng xử lý.</p>
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
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <textarea class="form-control" name="description" rows="5"></textarea>
                                    <?php if (isset($error['description'])): ?>
                                    <p class="text-danger"> <?php echo $error['description'] ?> </p>
                                <?php endif ?>
                                </div>
                                <button type="submit" class="btn btn-danger">Gửi báo cáo</button>
                            </form>
                        </div>               

 <?php require_once __DIR__. "/layouts/footer.php"; ?> 