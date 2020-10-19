 <footer>
      <div class="footer-main">
        <div class="container">
{{--         <div class="brand-list">
          <ul class="ul list-brand" id="footer-slider">
            <li><img border=0 src="./frontend/images/08_Octa1b70239eedd577aa7969733692b7a72.jpg" width='106' height='44' alt="Intel"/></li>
            <li><img border=0 src="./frontend/images/08_Oct5bac388a574b4fa9a950f711514186bc.jpg" width='90' height='42' alt="Samsung"/></li>
            <li><img border=0 src="./frontend/images/08_Oct96db89e482b3229f33f82d2c8a7cfde7.jpg" width='89' height='43' alt="LG"/></li>
            <li><img border=0 src="./frontend/images/08_Octe144de22465de1cd9e26300d4186f816.jpg" width='106' height='44' alt="Asus"/></li>
            <li><img border=0 src="./frontend/images/08_Oct2a007083f6cf079bf2c538101b4b33fd.jpg" width='106' height='44' alt="Msi"/></li>
            <li><img border=0 src="./frontend/images/08_Oct451e88ab665c72c8fc82a882102aa0e1.jpg" width='109' height='42' alt="Sony"/></li>
          </ul>
        </div> --}}
        </div>
        </div>
        <div id="footer-bottom">
        <div class="container" id="chinhsach-footer">
        <table>
          <tbody>
            <tr>
              <td style="width:290px;">
                <div class="list_info">
                  <b class="font16 title">Công ty TNHH Tin Học Minh An</b>
                  <a href="javascript:void(0)">Showroom: Số 29 LK6C Làng Việt Kiều Châu Âu, Mộ Lao, Hà Đông, HN </a>
                  <a href="/ban-do-minh-an-computer-ha-dong.html" target="_blank" style="color: #fbff00;"> [Xem bản đồ]</a>
                  <a href="tel:18006321">Tổng đài miễn phí(24/7): 1800 6321</a>
                  <a href="tel:0969629965"> DĐ: 0969.629.965 - Email: mac@minhancomputer.com</a>
                  <a href="https://minhancomputer.com">Website: https://minhancomputer.com </a>
                  <a> GPĐKKD: 0108588845, cấp lần đầu ngày 16/01/2019 tại Sở KHĐT TP. Hà Nội</a>
                </div>
              </td>
              <td style="width:660px;">
                <div class="list_info">
                  <b class="font16 title">Thông tin công ty</b>
                  <a href="/gioi-thieu" rel="nofollow">Giới thiệu công ty</a>
                  <!-- <a href="#" rel="nofollow">Điều khoản giao dịch</a> -->
                  <a href="/quy-dinh-truy-cap-website.html" rel="nofollow">Quy định truy cập website</a>
                  <a href="/thong-tin-lien-he.html" rel="nofollow">Thông tin liên hệ</a>
                </div>
              </td>
              <td style="width:298px;">
                <div class="center" style="margin-top:-30px; margin-bottom:20px; padding-top:25px;">
                  <a href="http://online.gov.vn/Home/WebDetails/64868" target="_blank" title="Đã đăng ký bộ công thương"><img src="./frontend/images/dathongbao.png"></a>
                  <div class="space10"></div>
                  <div id="news_letter">
                    <p><span class="btn btn-blue">Đăng ký</span> nhận tin KHUYẾN MÃI</p>
                    <input type="text" name="" id="email_newsletter" placeholder="Nhập địa chỉ email của bạn">
                    <a href="javascript:Glee.subscribe_newsletter()" class="btn button">GỬI NGAY</a>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
        <!--container-->
        </div>

        <div class="container" style="padding:10px 0 40px 0;">
        <div id="copyright">Copyright ©2020 Minh An Computer <a href="https://phongnetchuyennghiep.com">lắp đặt phòng net</a>, tư vấn chuyên sâu Game Net</div>
        </div>

        </footer>
      
        <script src="./frontend/js/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
        <script src="./frontend/js/main.js"></script>
        <script>
          new WOW().init();

        </script>
{{--         <script src="./frontend/js/Url.min.js"> </script>
        <script src="./frontend/js/Base64.min.js"> </script> --}}

        <!--//End setup affiliate tracking-->
        <!---//script hien thi tat ca cac trang-->
        <script>
         //load sub-menu
         $("#nav_doc ul li").hover(function () {
          $(this).find(".sub-nav").css("left", "207px");
        }, function () {
          $(this).find(".sub-nav").css("left", "-2209px");
        });
        </script>
        <script type="text/javascript">
        $(function(){
          $("#main-menu").hover(function(){
            $("#main-menu ul li.li-hide").show();
            $(".sub-nav").css("min-height",$("#main-menu .menu").height()+8);
          },function(){
          $("#main-menu ul li.li-hide").hide();
          });
        })
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
          //fixed top
          $(window).scroll(function(){
          t = $(window).scrollTop();
          if(t > 490){
          $("#wrap-header,#nav-main").addClass("fixed");
          $(".support-online-header").show();
          }
          else{
          $("#wrap-header,#nav-main").removeClass("fixed");
          $(".support-online-header").hide();
          }
          });
        //toTop------
        $(function() {
        $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
          $('#toTop').fadeIn().addClass("active");
        } else {
          $('#toTop').fadeOut().removeClass('active');
        }
        });

        $('#toTop').click(function() {
        $('body,html').animate({scrollTop:0},800);
        });
        });

        $('body').click(function() {
        $(".autocomplete-suggestions").hide();
        });
        });
        </script>
        <script>
        function tooltip(){
        var w_tooltip = $(".tooltip").width();
        var h_tooltip = 0;
        var pad = 10; 
        var x_mouse = 0; var y_mouse = 0;
        var wrap_left = 0;
        var wrap_right = 0;
        var wrap_top = 0;
        var wrap_bottom = 0;
        $(".tool-show .item .p-img").mousemove(function(e){
        wrap_left = $(this).parent().parent().parent().offset().left;
        wrap_top = $(this).parent().parent().parent().offset().top;
        wrap_bottom = $(this).parent().parent().parent().offset().top + $(this).parent().parent().parents(".product_list").height();
        x_mouse = e.pageX - $(this).offset().left;
        y_mouse = e.pageY - $(this).offset().top;
        h_tooltip = $(this).parent().parent().children(".tooltip").height();
        $(".tooltip").hide();


              //Move Horizontal
              if($(this).offset().left - pad - w_tooltip > wrap_left){
                $(this).parent().parent().children(".tooltip").css("left", 0-(w_tooltip + pad) + x_mouse);
              }else{
                $(this).parent().parent().children(".tooltip").css("left", pad + x_mouse + 20);
              }
              
              //Move Vertical   
              if(e.pageY + h_tooltip >= $(window).height() + $(window).scrollTop()){
                $(this).parent().parent().children(".tooltip").css("top", y_mouse - h_tooltip - pad)
              }else{
                $(this).parent().parent().children(".tooltip").css("top", pad+ y_mouse + 20);
              }
              //Show tooltip  
              $(this).parent().parent().children(".tooltip").show();
            });

        $(".item .p-img").mouseout(function(){
        $(".tooltip").hide();
        });
        }        
        </script>
        <script>
        $(document).ready(function(e) {
        tooltip();
        });

        $(document).ajaxStop(function(e) {
        tooltip();
        });
        </script>
        <!---//script hien thi homepage-->
        <script type="text/javascript" src="/template/default/script/popup.js"></script>
        <script>
        //sync slider
        var sync1 = $("#sync1");
        sync1.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true,
        margin: 10,
        nav: true,
        navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        dots: false,
        });
        $(document).ready(function(){
        $(".title_tab a").click(function(){
          $(".title_tab a").removeClass("current");
          $(this).addClass("current");

          $(".d-none").hide();
          $($(this).attr("href")).show();
          return false;
        });

        $('.product_list .owl-carousel').owlCarousel({
          loop: true,
          autoplay: true,
          autoPlaySpeed: 1000,
          autoPlayTimeout: 1000,
          autoplayHoverPause: true,
          margin: 10,
          nav: true,
          navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
          dots: false,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
        });
        });
        $(function(){
        $("#icon-fixed-left a").hover(function(){
        var top = $(this).offset().top;
        var left = $(this).offset().left;
        var title = $(this).find("span").html();
        $("#tooltip-category-fixed-left").css({"top":top,"left":left+50}).html(title).show();
        },function(){
        $("#tooltip-category-fixed-left").hide();
        });  
        })
        </script>
        <div id="toTop" title="Lên đầu trang" class="transition"></div>