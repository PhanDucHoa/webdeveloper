<hr>
<footer class="section footer-classic context-dark bg-image homepage-size style=" background: white;">
    <div class="container">
      <div class="row row-30">
        <div class="col-md-4 col-xl-5">
          <div class="pr-xl-4">
            <a class="brand" href="index.php"><img class="brand-logo-light" src="<?php echo base_url() ?>public/frontend/image/logo.jpg" alt="" width="280"
                srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a><br></br>

            <p>1doi1.vn là nền tảng trao đổi hàng hóa đầu tiên tại Việt Nam - Cho phép mọi người đăng tin trao đổi
              các
              loại sản phẩm một cách dễ dàng , tiện lợi</p>

            <!-- Rights-->
            <p class="rights"><span>©  </span><span class="copyright-year">2018</span><span> </span><span>1doi1.vn</span><span>. </span><span>All
                Rights Reserved.</span></p>
          </div>
        </div>
        <div class="col-md-4">
          <h5>Liên Hệ</h5>
          <dl class="contact-list">
            <dt>Địa Chỉ</dt>
            <dd>Đại Học Công Nghệ Thông Tin</dd>
          </dl>
          <dl class="contact-list">
            <dt>Email:</dt>
            <dd><a href="mailto:#">16520448@gm.uit.edu.vn</a></dd>
          </dl>
          <dl class="contact-list">
            <dt>Số Điện Thoại:</dt>
            <dd><a href="tel:#">+12 34 5678</a>
            </dd>
          </dl>
        </div>
        <div class="col-md-4 col-xl-3">
          <h5>Hỗ Trợ Khách Hàng</h5>
          <ul class="nav-list">
            <li><a href="#">Trung tâm trợ giúp</a></li>
            <li><a href="#">Quy định cần biết</a></li>
            <li><a href="about.php">Về chúng tôi</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row no-gutters social-container">
      <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
      <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>Instagram</span></a></div>
      <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>Twitter</span></a></div>
      <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>Google+</span></a></div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url() ?>public/frontend/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.modal-footer button').click(function(){
        var button = $(this);

        if ( button.attr("data-dismiss") != "modal" ){
          var inputs = $('form input');
          var title = $('.modal-title');
          var progress = $('.progress');
          var progressBar = $('.progress-bar');

          inputs.attr("disabled", "disabled");

          button.hide();

          progress.show();

          progressBar.animate({width : "100%"}, 100);

          progress.delay(1000)
                  .fadeOut(600);

          button.text("Close")
              .removeClass("btn-primary")
              .addClass("btn-success")
              .blur()
              .delay(1600)
              .fadeIn(function(){
                title.text("Log in is successful");
                button.attr("data-dismiss", "modal");
              });
        }
      });

      $('#myModal').on('hidden.bs.modal', function (e) {
        var inputs = $('form input');
        var title = $('.modal-title');
        var progressBar = $('.progress-bar');
        var button = $('.modal-footer button');

        inputs.removeAttr("disabled");

        title.text("Log in");

        progressBar.css({ "width" : "0%" });

        button.removeClass("btn-success")
            .addClass("btn-primary")
            .text("Ok")
            .removeAttr("data-dismiss");
                          
        });
      });
          </script>

</body>

</html>