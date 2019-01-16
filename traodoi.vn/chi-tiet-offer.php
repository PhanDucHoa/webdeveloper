<?php require_once __DIR__. "/layouts/header.php"; ?> 
<?php 
  $sql = "SELECT * FROM product ORDER BY ID DESC LIMIT 6";
  $product = $db->fetchsql($sql);
  $category = $db->fetchAll('category');

?>
<?php 
	$id = intval(getInput('id'));
	$GetProduct = $db->fetchID("product",$id);
	$sql_current = "select user.name, user.address, user.phone,user.email from user,offer where offer.product_id = '".$id."' and offer.user_id = user.id";
	$current_user = $db->fetchsql($sql_current);
 ?>
<div class="container"></br>
      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Sản phẩm:
        <small><?php echo $GetProduct['name']  ?></small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row col-md-12 align-middle">

        <div class="col-md-8">
          <img class="img-fluid" src="<?php echo uploads() ?>product/<?php echo $GetProduct['thumbnail'] ?>">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Thông tin sản phẩm</h3>
          <p><?php echo $GetProduct['description']  ?></p>
          <h3 class="my-3">Thông tin người đăng sản phẩm</h3>
          <ul>
          	<?php foreach ($current_user as $item): ?>
            <li>Người đăng: <?php echo $item['name'] ?></li>
            <li>Địa chỉ: <?php echo $item['address'] ?></li>
            <li>Số điện thoại liên lạc: <?php echo $item['phone'] ?></li>
            <li>Email liên lạc: <?php echo $item['email'] ?></li>
            <?php endforeach ?>
          </ul>
          <a href="bao-cao.php?id=<?php echo $id ?>" class="btn btn-danger align-center mt-4">Báo cáo sản phẩm</a>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Sản phẩm mới nhất</h3>

      <div class="row">

         <?php foreach ($product as $item): ?>
        <div class="col-lg-2 portfolio-item">
        <div class="card h-100">
          <a href="chi-tiet-offer.php?id=<?php echo $item['id'] ?>"><img class="card-img-top" src="<?php echo uploads() ?>product/<?php echo $item['thumbnail'] ?>"
              alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="chi-tiet-offer.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']  ?></a>
            </h4>
            <p class="card-text"><?php echo $item['description']  ?></p>
          </div>
        </div>
      </div>
      <?php endforeach ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php require_once __DIR__. "/layouts/footer.php"; ?> 