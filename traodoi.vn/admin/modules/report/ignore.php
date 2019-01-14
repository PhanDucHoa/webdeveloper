<?php 
    $open = "report";
    require_once __DIR__. "/../../autoload/autoload.php";
    $id = intval(getInput('id'));

    $EditReport = $db->fetchID("report",$id);
    if (empty($EditReport))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin("report");
    }
    $num = $db->delete("report",$id);
    if ($num > 0)
    {
        $_SESSION['success'] = "Bỏ qua thành công.";
        redirectAdmin("report");
    }
    else
    {
        $_SESSION['error'] = "Có lỗi xảy ra khi bỏ qua. Vui lòng thử lại.";
        redirectAdmin("report");
    }
 ?>