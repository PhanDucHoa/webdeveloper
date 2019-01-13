
<?php require_once __DIR__. "/../layouts/header.php"; ?> 
<?php 
  $sql = "SELECT * FROM product ORDER BY ID DESC LIMIT 6";
  $product = $db->fetchsql($sql);

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
      <div class="category-brief">From Cars to Cameras, Properties to Pets, Mobile phones to Motorcycles, Treadmills to
        Textbooks, Watches to Washing machines, Jobs and many more...</div>


      <div class="category-items">
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Cars" data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_cars_grey.svg" class="svg">
          <div>Xe Hơi</div>
        </a>
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Electronics" data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_electronics_grey.svg" class="svg">
          <div>Điện Tử</div>
        </a>
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Services" data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_service_grey.svg" class="svg">
          <div>Dịch Vụ</div>
        </a>
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Sports and Hobbies" data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_sports_grey.svg" class="svg">
          <div>Thể Thao &amp; Sở Thích</div>
        </a>
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Women's Collections" data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_women_grey.svg" class="svg">
          <div>Thời Trang Nữ</div>
        </a>
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Pets" data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_pets_grey.svg" class="svg">
          <div>Thú Nuôi</div>
        </a>
        <a href="" class="trackable" data-event_type="link" data-event_name="Browse by Category (Homepage 2017)"
          data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::Games and Consoles" data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_games_grey.svg" class="svg">
          <div>Thiết Bị Game</div>
        </a>
        <a href="#" data-toggle="modal" data-target="#otherCatModal" class="trackable" data-event_type="link"
          data-event_name="Browse by Category (Homepage 2017)" data-xtn2="91" data-page_name="Browse by Category (Homepage 2017)::See other 52 categories"
          data-click_type="N">
          <img src="<?php echo base_url() ?>public/frontend/image/category-/cat_others_grey.svg" class="svg">
          <div>Chuyên Mục Khác</div>
        </a>
      </div>
    </div>
  </div>
  <br><br>

  <!-- Deal For You -->

  <div class="container homepage-size">
    <h4>Dành Riêng Cho Bạn</h4>
    <div class="row">
      <?php foreach ($product as $item): ?>
        <div class="col-lg-2 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="<?php echo uploads() ?>product/<?php echo $item['thumbnail'] ?>"
              alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#"><?php echo $item['name']  ?></a>
            </h4>
            <p class="card-text"><?php echo $item['description']  ?></p>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      
        
      
    </div>
  </div>


  <!-- Marketing Icons Section -->

  <div class="row homepage-size">
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Tiết kiệm</h4>
        <div class="card-body">
          <p class="card-text">Bạn có thể tiết kiệm 1 khoảng lớn tiền mà bạn đã đổi, thay vì phải mua 1
            cái mới hoàn toàn.</p>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Sạch</h4>
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
          <p class="card-text">Gặp gỡ thêm nhiều người cùng sở thích, thêm bạn thêm vui.</p>
        </div>
        <div class="card-footer">
          <!--a href="#" class="btn btn-primary">Learn More</a-->
        </div>
      </div>
    </div>
  </div>

  <hr>


  <!-- Footer -->

<?php require_once __DIR__. "/../layouts/footer.php"; ?> 
