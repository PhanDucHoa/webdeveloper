<?php require_once __DIR__. "/layouts/header.php"; ?>

<?php 
    $id = intval(getInput('id'));
    $GetUser = $db->fetchID("user",$id);
    $sql_current = "select product.name, product.id from product,offer where offer.user_id = '".$id."' and offer.product_id = product.id";
    $current_product = $db->fetchsql($sql_current);
 ?>
 <?php 
    require_once __DIR__. "/autoload/autoload.php";
        $open = "user";
        $id_user = intval(getInput('id'));

        $EditUser = $db->fetchID("user",$id_user);
        if (empty($EditUser))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirect("index.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name" => postInput('name'),
            "email" => postInput('email'),
            "phone" => postInput('phone'),
            "address" => postInput('address'),
            "password" => MD5(postInput('password'))
        ];
        $error = [];
        if (postInput('name') == '')
        {
            $error['name'] = "Bạn cần nhập tên người dùng!";
        }
        if (postInput('email') == '')
        {
            $error['email'] = "Bạn cần nhập email!";
        }
        else 
        {
            if (postInput('email') != $EditUser['email'])
            {
                $is_check = $db->fetchOne("user","email = '".$data['email']."'");
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

            $id_update = $db->update("user",$data,array("id"=>$id));
            if ($id_update > 0)
            {
                unset($_SESSION['name_user']);  
                unset($_SESSION['name_id']);    
                $_SESSION['success'] = "Cập nhật thành công. Mời bạn đăng nhập lại để tiếp tục.";
                redirect('index.php');
            }
            else
            {
                $_SESSION['error'] = "Lỗi xảy ra khi cập nhật tài khoản. Vui lòng thử lại.";
                redirect('index.php');
            }


        }
    }
 ?>

<div class="container">
    <div class="row col-lg-12">
        <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active ">Thông Tin Tài Khoản</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Chỉnh sửa</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <h3 class="col-lg-6 mt-2">Thông Tin Cá Nhân</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Tên người dùng: </h6>
                            <p>
                                <?php echo $GetUser['name'] ?>
                            </p>
                            <h6>Email:</h6>
                            <p>
                                <?php echo $GetUser['email'] ?>
                            </p>
                            <h6>Số điện thoại:</h6>
                            <p>
                                <?php echo $GetUser['phone'] ?>
                            </p>
                            <h6>Địa chỉ:</h6>
                            <p>
                                <?php echo $GetUser['address'] ?>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Sản phẩm của bạn</h4>
                            <table class="table table-hover table-striped">
                                <tbody> 
                                <?php foreach ($current_product as $item): ?>                                   
                                    <tr>
                                        <td>
                                            <h5><?php echo $item['name'] ?></h5>
                                            <div class="float-right">
                                            <a class="btn btn-info" href="chi-tiet-offer.php?id=<?php echo $item['id'] ?>">Xem</a>
                                            <a class="btn btn-success" href="sua-offer.php?id=<?php echo $item['id'] ?>">Sửa</a>
                                            <a class="btn btn-danger" href="xoa-offer.php?id=<?php echo $item['id'] ?>">Xóa</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="edit">
                    <h4 class="m-y-2">Chỉnh sửa thông tin tài khoản</h4>
                    <form role="form" method="POST">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Tên người dùng</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="name" value="<?php echo $EditUser['name'] ?>">
                                <?php if (isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?> </p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" value="<?php echo $EditUser['email'] ?>">
                                <?php if (isset($error['email'])): ?>
                                    <p class="text-danger"> <?php echo $error['email'] ?> </p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Số điện thoại</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="phone" value="<?php echo $EditUser['phone'] ?>">
                                <?php if (isset($error['phone'])): ?>
                                    <p class="text-danger"> <?php echo $error['phone'] ?> </p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Địa chỉ</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="address" value="<?php echo $EditUser['address'] ?>" placeholder="Street">
                                <?php if (isset($error['address'])): ?>
                                    <p class="text-danger"> <?php echo $error['address'] ?> </p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mật khẩu</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password">
                                <?php if (isset($error['password'])): ?>
                                    <p class="text-danger"> <?php echo $error['password'] ?> </p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nhập lại mật khẩu</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="re_password">
                                <?php if (isset($error['re_password'])): ?>
                                    <p class="text-danger"> <?php echo $error['re_password'] ?> </p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php require_once __DIR__. "/layouts/footer.php"; ?>