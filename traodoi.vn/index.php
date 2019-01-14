
<?php require_once __DIR__. "/layouts/header.php"; ?> 
<?php 
  $sql = "SELECT * FROM product ORDER BY ID DESC LIMIT 6";
  $product = $db->fetchsql($sql);
  $category = $db->fetchAll('category');

?>
  <!-- Slider -->
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('<?php echo base_url() ?>public/frontend/image/oldthing.png')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Cũ với mình nhưng mới với mọi người</h3>
            <h6 class="special2">Cũ Nhưng Giá Trị</h6>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('<?php echo base_url() ?>public/frontend/image/laptop.jpg')">
          <div class="carousel-caption d-none d-md-block special1 ">
            <h3>Thay mới niềm vui mới</h3>
            <h6>Thay Đổi Để Trải Nghiệm</h6>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('<?php echo base_url() ?>public/frontend/image/BusinessSuccess.jpg')">
          <div class="carousel-caption d-none d-md-block special">
            <h3>Chiến lược Win-Win - Bí quyết thành công</h3>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>


  <!-- Categories -->


  <div class="homepage-size">
    <div class="category">
      <div class="browse-title">Danh Mục Sản Phẩm</div>
      <div class="category-brief">Mọi thứ đều có ở đây.</div>


      <div class="category-items">
        <?php foreach ($category as $item): ?>
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Cars" data-click_type="N">
          <img src="<?php echo uploads() ?>category/<?php echo $item['icon'] ?>">
          <div><?php echo $item['name']  ?></div>
        </a>
         <?php endforeach ?>
      </div>
    </div>
  </div>
  <br><br>

  <!-- Deal For You -->

  <div class="container homepage-size">
    <div class="homepage-size">
    <div class="category">
      <div class="browse-title">Sản phẩm mới nhất</div>
    </div>
  </div>
    <div class="row">
      <?php foreach ($product as $item): ?>
        <div class="col-lg-2 portfolio-item">
        <div class="card h-100">
          <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><img class="card-img-top" src="<?php echo uploads() ?>product/<?php echo $item['thumbnail'] ?>"
              alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']  ?></a>
            </h4>
            <p class="card-text"><?php echo $item['description']  ?></p>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      
        
      
    </div>
  </div>


  <!-- Marketing Icons Section -->
<div class="homepage-size">
    <div class="category">
      <div class="browse-title">Vì sao nên trao đổi sản phẩm?</div>
    </div>
  </div>
  <div class="row homepage-size">
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Tiết kiệm</h4>
        <div class="card-body">
          <p class="card-text">Bạn có thể tiết kiệm 1 khoản lớn tiền mà bạn đã đổi, thay vì phải mua 1
            cái mới hoàn toàn.</p>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Bảo vệ môi trường</h4>
        <div class="card-body">
          <p class="card-text">Hạn chế rác thải, cho cuộc sống thêm phần xanh.</p>
        </div>
        <div class="card-footer">
          <!--a href="#" class="btn btn-primary">Learn More</a-->
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Giao lưu</h4>
        <div class="card-body">
          <p class="card-text">Gặp gỡ thêm nhiều người có cùng sở thích, thêm bạn thêm vui.</p>
        </div>
        <div class="card-footer">
          <!--a href="#" class="btn btn-primary">Learn More</a-->
        </div>
      </div>
    </div>
  </div>

  <hr>


  <!-- Footer -->

<?php require_once __DIR__. "/layouts/footer.php"; ?> 
