      <div class="container">
        <div class="banner_scroll scroll_left" style="display: none"></div>
        <div class="banner_scroll scroll_right" style="display: none"></div>
        <ul class="ul">
          <li id="support_top">
            <i class="social-icon icon-fb fa fa-skype" aria-hidden="true"></i><a href="#"><b>Thời gian làm việc: </b> Tất cả các ngày trong tuần kể cả ngày lễ, Từ 8h30 - 20h30</a>&nbsp;<i
              class="bg icon_drop"></i>
          </li>
          <li id="list_hot_news_top">
          <i class="social-icon icon-news fa fa-newspaper-o" aria-hidden="true"></i><a href="/tin-tuc">Tin
          tức</a> <i class="bg icon_drop"></i>
          <ul class="ul">
          <li><a href="/kien-thuc-chung-ve-card-man-hinh-choi-game-vga.html"><img src="/media/news/120_214_card_man_hinh_choi_game.jpg" alt="Kiến thức chung về card màn hình chơi game VGA"/> <span>Kiến thức chung về card màn hình chơi game VGA</span> </a></li>
          <li><a href="/nhung-luu-y-khi-mua-pc-gaming-ban-nen-biet.html"><img src="/media/news/120_206_pc_gaming_can_biet.jpg" alt="Những lưu ý khi mua PC GAMING bạn nên biết"/> <span>Những lưu ý khi mua PC GAMING bạn nên biết</span> </a></li>
          <li><a href="/huong-dan-tu-build-1-bo-may-tinh-de-ban-choi-game.html"><img src="/media/news/120_74_huong_dan_tu_build_1_bo_may_tinh_de_ban_choi_game_3.jpg" alt="Hướng dẫn - chú ý khi tự build 1 bộ máy tính để bàn chơi game"/> <span>Hướng dẫn - chú ý khi tự build 1 bộ máy tính để bàn chơi game</span> </a></li>
          </ul>
          </li>
          <li style="margin:0">
          <div id="login_header" class="txt_u" style="line-height: 35px;">
          <i class="social-icon icon-user fa fa-user-o" aria-hidden="true"></i><a href="/dang-ky" rel="nofollow">Đăng
          ký</a> | <a href="/dang-nhap" rel="nofollow">Đăng nhập</a>
          </div>
          </li>
        </ul>
        </div>
      </div>
      <!-- end top -->
      <div class="clear"></div>

      <div id="wrap-header">
        <div id="header">
          <div class="container">
            <a href="/" id="logo">
            <img src="{{ asset('uploads/images/config/'.$dataConfig->logo) }}" alt="" />
            </a>
            <div id="search">
              <form method="get" action="/tim" enctype="multipart/form-data">
                <input type="text" class="text" id="text_search" name="q" placeholder="Nhập nội dung tìm kiếm ..." autocomplete="off" />
                <button type="submit" id="submit_search"><i class="fa fa-search"></i></button>
              </form>
              <div class="autocomplete-suggestions"></div>
            </div>
            <!--search-->
            <div id="header_right">
              <div id="hotline_header">
                <a href="tel:0852346111">
                <i class="icon-hotline"></i>
                <span>Tổng đài miễn phí</span>
                <span><b class="hotline-number">{{ $dataConfig->phone }}</b></span>
                </a>
              </div>
            </div>
            <div id="cart" class="cart-header">
              <div class="btn-cart" id="cart-block">
                <a title="My cart" href="{{ url('/gio-hang') }}">Giỏ hàng</a>
                @if (isset($count_cart) && $count_cart != "")
                  <span class="notify notify-right">{{ $count_cart }}</span>
                @else
                  <span class="notify notify-right">0</span>
                @endif
                
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
        <div id="nav-main">
          <div class="container">
            <div id="nav_doc">
              <div class="title_nav-doc">
                <i class="fa fa-bars"></i> Tất cả danh mục
              </div>

              <ul class="ul ul_menu" >
                @foreach ($menu_data as $item)
                  <li style="background-image:url('{{ asset('./uploads/images/category/'.$item['image']) }}'">
                    <a href="{{ url('danh-muc/'.$item['slug']) }}" class="root">{{ $item['name']}}</a>
                    @if ( count($item['child']) > 0 )
                        <div class="sub-nav">
                          @foreach ($item['child'] as $element)
                            <div class="box_cate">
                              @if ( count($element['child']) > 0 )
                               <a href="{{url('danh-muc/'.$element['slug'])}}" class="sub1">{{$element['name']}}</a>
                                 @foreach ($element['child'] as $element1)
                                  <a href="{{url('danh-muc/'.$element1['slug'])}}" class="sub2">{{$element1['name']}}</a>
                                 @endforeach
                              @else
                                <a href="{{url('danh-muc/'.$element['slug'])}}" class="sub1">{{$element['name']}}</a>
                              @endif
                            </div>
                          @endforeach
                        </div>
                    @endif
                  </li>
                @endforeach
              </ul>
            </div>
            <div id="nav_ngang">
              @foreach ($page as $element)
                 <a @if ($element->status == 1)
                   href="{{ url('/'.$element->slug) }}"
                 @endif>
                  <img src="{{ asset('uploads/images/category/'.$element->image) }}" alt="">{{ $element->name }}
                </a>
              @endforeach
             
           
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>

      <span id="tooltip-category-fixed-left">title</span>
      <div id="icon-fixed-left" style="display: none;">
        @foreach ($menu_data as $item)
        <a href="{{ url('danh-muc/'.$item['slug']) }}"><i class="icons_2019" style="background-image:url('{{ asset('./uploads/images/category/'.$item['image']) }}')"></i><span>{{ $item['name']}}</span></a>
        @endforeach
      </div>