<?php 
    require_once __DIR__. "/autoload/autoload.php";
    if (!isset($_SESSION['name_user']))
    {
            echo "<script>alert('Bạn cần đăng nhập để có thể xóa sản phẩm!');location.href='dang-nhap.php'</script>";
    }
    
        $id = intval(getInput('id'));
        $sql = "SELECT * FROM offer WHERE offer.product_id = '".$id."'";
        $current_user = $db->fetchsql($sql);
        if ($current_user['0']['user_id'] != $_SESSION['name_id'])
        {
            echo "<script>alert('Bạn không có quyền xóa sửa sản phẩm này!');
            location.href='index.php';</script>";
        }
    
 ?>
<?php 
    $open = "product";
    require_once __DIR__. "/autoload/autoload.php";
    $id = intval(getInput('id'));

    $EditProduct = $db->fetchID("product",$id);
    if (empty($EditProduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại!";
        redirectAdmin("product");
    }
    $num1 = $db->delete("product",$id);
    $sql_offer = "SELECT id FROM offer WHERE product_id = '".$id."'";
    $current_offer = $db->fetchsql($sql_offer);
    $num2 = $db->delete("offer",$current_offer['0']['id']);
    
    if ($num > 0)
    {
        $_SESSION['success'] = "Xóa thành công.";
        redirect("index.php");
    }
    else
    {
        $_SESSION['error'] = "Có lỗi xảy ra khi xóa. Vui lòng thử lại.";
        redirect("index.php");
    }
 ?>