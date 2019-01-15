<?php require_once __DIR__. "/layouts/header.php"; ?>
<!-- Page Content -->
    <body>
        <div class="container">
    <br/>
  <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input action="tim-kiem.php" method="get" class="form-control form-control-lg form-control-borderless" type="search" name="search" placeholder="Tìm kiếm tên sản phẩm ...">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-warning" name="ok" type="submit">Tìm kiếm</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>
        <?php
        // Nếu người dùng submit form thì thực hiện
        require_once __DIR__. "/autoload/autoload.php";
        $id = intval(getInput('id'));
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
            $error = [];
            if ($search == '')
            {
              $error['search'] = "Bạn cần điền vào ô tìm kiếm!";
              redirect('tim-kiem.php');
            }
            if (empty($error))
            {
              $_SESSION['result'] = "result";

              if (isset($_GET['p']))
              {
                  $p = $_GET['p'];
              }
              else
              {
                  $p = 1;
              }
              
              $sql = "SELECT * FROM product WHERE name LIKE '%$search%'";

              $total = count($db->fetchsql($sql));
              
              $result = $db->fetchJones("product",$sql,$total,$p,5,true);
              $sotrang = $result['page'];
              unset($result['page']);
              $path = $_SERVER['SCRIPT_NAME'];
            }
        }
        ?>
  </body>
    <?php if (isset($_SESSION['result'])): ?>   
    <!-- Page Content -->
    <div class="container col-lg-8">

      <!-- Page Heading -->
      <h1 class="my-4">Kết quả tìm kiếm cho "<?php echo $_GET['search'] ?>":</h1>

      <!-- Project One -->
      <?php foreach ($result as $item): ?>
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo uploads() ?>product/<?php echo $item['thumbnail'] ?>" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo $item['name']  ?></h3>
          <p><?php echo $item['description']  ?></p>
          <a class="btn btn-primary" href="chi-tiet-offer.php?id=<?php echo $item['id'] ?>">Xem sản phẩm</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>
      
      <?php endforeach ?>
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">«</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <?php for($i = 1; $i <= $sotrang; $i++): ?>
                                    <?php 
                                        if(isset($_GET['page']))
                                        {
                                            $p = $_GET['page'];
                                        }
                                        else
                                        {
                                            $p = 1;
                                        }
                                     ?>
                                     <li class="<?php echo ($i == $p) ? 'active':'' ?>">
                                        <a href="tim-kiem?search=<?php echo $_GET['search'] ?>&ok=?id=<?php echo $id ?>&&p=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="<?php echo $i; ?>" tabindex="0" class="page-link"><?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php endfor ?>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">»</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </div>
  <?php endif; ?>
  <?php unset($_SESSION['result']) ?>
    <!-- /.container -->
<?php require_once __DIR__. "/layouts/footer.php"; ?>