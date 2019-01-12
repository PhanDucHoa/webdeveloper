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
    $num = $db->delete("category",$id);
    if ($num > 0)
    {
        $_SESSION['success'] = "Xóa thành công.";
        redirectAdmin("category");
    }
    else
    {
        $_SESSION['error'] = "Có lỗi xảy ra khi xóa. Vui lòng thử lại.";
        redirectAdmin("category");
    }
 ?>