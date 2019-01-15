<?php 
    $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";
    $id = intval(getInput('id'));

    $EditUser = $db->fetchID("user",$id);
    if (empty($EditUser))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin("user");
    }
    $num = $db->delete("user",$id);
    if ($num > 0)
    {
        $_SESSION['success'] = "Xóa thành công.";
        redirectAdmin("user");
    }
    else
    {
        $_SESSION['error'] = "Có lỗi xảy ra khi xóa. Vui lòng thử lại.";
        redirectAdmin("user");
    }
 ?>