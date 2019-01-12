<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name" => postInput('name')
        ];
        $error = [];
        if (postInput('name') == '')
        {
            $error['name'] = "Bạn cần nhập đầy đủ các danh mục!";
        }
        if (empty($error))
        {
            $id_insert = $db->insert("category",$data);
            print($id_insert);
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
                                    <a href="index.html">Các danh mục (Category)</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm mới</li>
                            </ol>
                            <!-- Page Content -->
                            <h1>Thêm mới danh mục</h1>
                            <hr>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="InputName" placeholder="Tên danh mục" name="name">
                                </div>
                                <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>                
