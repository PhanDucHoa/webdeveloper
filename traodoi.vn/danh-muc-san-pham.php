<?php require_once __DIR__. "/layouts/header.php"; ?> 

</div>
        <?php
        require_once __DIR__. "/autoload/autoload.php";
        $id = intval(getInput('id'));

              if (isset($_GET['p']))
              {
                  $p = $_GET['p'];
              }
              else
              {
                  $p = 1;
              }
              $sql_namecate = "SELECT category.name FROM category WHERE id = '".$id."'";
              $namecate = $db->fetchsql($sql_namecate);
              $sql = "SELECT * FROM product WHERE category_id = '".$id."'";
              $total = count($db->fetchsql($sql));
              
              $result = $db->fetchJones("category",$sql,$total,$p,5,true);
              $sotrang = $result['page'];
              unset($result['page']);
              $path = $_SERVER['SCRIPT_NAME'];
            
        
        ?>
  </body>  
    <!-- Page Content -->
    <div class="container col-lg-8">

      <!-- Page Heading -->
      <h1 class="my-4">Danh mục sản phẩm: <?php echo $namecate['0']['name'] ?></h1>

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
                                        <a href="danh-muc-san-pham?id=<?php echo $id ?>&&p=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="<?php echo $i; ?>" tabindex="0" class="page-link"><?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php endfor ?>
      </ul>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?> 