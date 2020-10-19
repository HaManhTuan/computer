@extends('layout.home.home_layout')
@section('mytitle',  ''.$dataPro->name)
@section('content')
<style>
#nav_doc:hover .ul.ul_menu
  {
    visibility:visible !important;
  }
#nav_doc .ul.ul_menu{
  visibility:hidden;
}
</style>
<script type="text/javascript" src="./frontend/js/fancybox.js"></script>
<link rel="stylesheet" href="./frontend/css/magiczoom.css" type="text/css" />
<script type="text/javascript" src="./frontend/js/magiczoom.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    $("#title_tab_scroll_pro a").click(function(){
      $("#title_tab_scroll_pro a").removeClass("current");
      $(this).addClass("current");
      
      //$(".content_scroll_tab").hide();
      //$($(this).attr("href")).show();
      
      $('body,html').animate({scrollTop:$($(this).attr("href")).offset().top - 90},800);
      return false;
    });
    var get_top = 0;
    if(get_top == 0) get_top = $("#title_tab_scroll_pro").offset().top;
    
    $(window).scroll(function(){
    if($(window).scrollTop() > get_top - 80) $("#title_tab_scroll_pro").addClass("fixed");
    else $("#title_tab_scroll_pro").removeClass("fixed");
    });
    
    $(".btn_image_link").click(function(){
    $('body,html').animate({scrollTop:$("#tab2").offset().top - 40},800);
    return false;
    });
    $(".btn_video_link").click(function(){
    $('body,html').animate({scrollTop:$("#tab6").offset().top - 40},800);
    return false;
    });
    $("#go_comment").click(function(){
    $('body,html').animate({scrollTop:$("#tab5").offset().top - 40},800);
    return false;
    });
    MagicZoom.options = { 
  'selectors-change' : 'click',
  'right-click' : true,
  'disable-zoom' : false,
  'fit-zoom-window':false,
  'zoom-width' : 450,
  'zoom-height' : 450
  }
  $(".fancybox").fancybox();
  $("#img_large .MagicZoom").click(function(){
    $(".view-large").click();
  });
  });
 
</script>
<div class="breadcrumb container mb-2 pb-2 px-md-0">
  <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
              <a href="{{ url('/') }}" itemprop="item" class="nopad-l">
                  <span itemprop="name">Trang chủ</span>
              </a>  
              <meta itemprop="position" content="1">
          </li>
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
              <a href="{{ url('danh-muc/'.$dataCate->slug) }}" itemprop="item">
                  
                  <span itemprop="name">{{ $dataCate->name }}</span>
              </a>
              <meta itemprop="position" content="2">
          </li>
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
              <a href="#" itemprop="item">
                  
                  <span itemprop="name">{{ $dataPro->name }}</span>
              </a>
              <meta itemprop="position" content="2">
          </li>
      </ol>
</div>
  <div class="product-main">
          <div class="product-detail-content">
            <div class="left-bar">
              <div class="product-info-top">
                <div id="img-gallery" class="p-itemMOSS025" data-id="197">
                  <div id="img_large" class="container-icon" style="position:relative;">
                    <a class="MagicZoom" id="Zoomer" rel="selectors-effect-speed: 600" href="{{ asset('./uploads/images/products/'.$dataPro->image) }}"
                      title="Click để xem ảnh lớn">
                    <img src="{{ asset('./uploads/images/products/'.$dataPro->image) }}"/>
                    </a>
                  </div>
                  <!-- end img_large -->
                  <ul id="img_thumb" class="ul">
                    @foreach ($dataImg as $element)
                    <li>
                      <a class="img_thumb" href="{{ asset('./uploads/images/products/img/'.$element->image) }}"  rel="zoom-id:Zoomer;" rev="{{ asset('./uploads/images/products/img/'.$element->image) }}">
                      <img src="{{ asset('./uploads/images/products/img/'.$element->image) }}" />
                      </a>
                    </li>
                    @endforeach
                  </ul>
                  <!-- end img_thumb -->
                  <div class="name_show">{{ $dataPro->name }}</div>
                  <div id="support_online_detail">
                    <div class="title">Bán hàng online</div>
                    <table>
                      <tr>
                        <td>
                          <a href="https://zalo.me/0921819999" title="saler" rel="nofollow" target="_blank">
                          <img style="width: 20px;" src="/template/default/images/icon_zalo.png" />Mr Giang: 0921.819.999
                          </a>
                        </td>
                        <td>
                          <a href="https://zalo.me/0799886111" title="saler" rel="nofollow" target="_blank">
                          <img style="width: 20px;" src="/template/default/images/icon_zalo.png" />Mr
                          Phúc: 0799.886.111
                          </a>
                        </td>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="https://zalo.me/0969398876" title="saler" rel="nofollow" target="_blank">
                          <img style="width: 20px;" src="/template/default/images/icon_zalo.png" />
                          Mr.Định: 0969.398.876
                          </a>
                        </td>
                        <td>
                          <a href="https://zalo.me/0966028865" title="saler" rel="nofollow" target="_blank">
                          <img style="width: 20px;" src="/template/default/images/icon_zalo.png" />
                          Mr.Hiếu: 0966.028.865
                          </a>
                        </td>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!-- end support_online_detail -->
                  
                </div>
                <!-- end img gallery -->
                <div id="product-info">
                  <h1>{{ $dataPro->name }}</h1>
                  {{-- <p class="float_l red">Mã SP: MOSS025</p> --}}
                  <!-- <p class="float_r"><i class="bg icon_fav"></i><a href="javascript:user_like_content(197, 'pro');">Lưu
                    sản phẩm yêu thích</a> </p> -->
                  <div class="hori_line"></div>
                  <div class="table_div">
                    <div class="cell">
                      {!! $dataPro->description !!}
                    </div>
                    <!-- end cell -->
                    @if ($dataPro->promotional_price > 0)
                      <div id="price_detail">
                        <i style="float:left;">{{ number_format($dataPro->promotional_price) }}</i>
                        <div class="img_price_full" style="float:left;">{{ number_format($dataPro->promotional_price) }}</div>
                        <div style="float: left;margin-top: 10px;margin-left: 10px;font-size: 15px;color: #333;text-shadow: none;font-weight: normal;font-style: normal;">[Giá
                          chưa bao gồm VAT]
                        </div>
                        <div class="clear"></div>
                        <p  style="margin-top: 10px;margin-left: 10px;font-size: 15px;color: #333;text-shadow: none;" >Giá niêm yết: <span class="line_through"  style="margin-top: 10px;margin-left: 10px;font-size: 15px;color: #333;text-shadow: none;" >{{ number_format($dataPro->price) }}</span>
                          <span class="percent_off">-{{ $dataPro->sale }}%</span>
                        </p>
                      </div>
                    @else
                      <div id="price_detail">
                        <i style="float:left;">{{ number_format($dataPro->price) }}</i>
                        <div class="img_price_full" style="float:left;">{{ number_format($dataPro->price) }}</div>
                        <div style="float: left;margin-top: 10px;margin-left: 10px;font-size: 15px;color: #333;text-shadow: none;font-weight: normal;font-style: normal;">[Giá
                          chưa bao gồm VAT]
                        </div>
                        <div class="clear"></div>
                      </div>
                    @endif

                    <!--price_detail-->
                    <!-- end offer_detail -->
                  </div>
                  <!-- end table -->
                  <div id="button_buy">
                    <a style="margin-left:0" id="buyNowConfig" href="javascript:;" data-id="197"
                      class="buyNow btn_large_red">
                    <span>Đặt mua ngay</span> Giao hàng tận nơi nhanh chóng
                    </a>
                    <a href="javascript:;" id="addCart" data-id="197" class="buyNow btn_large_orange">
                    <span>Cho vào giỏ</span> Cho vào giỏ để chọn tiếp
                    </a>
                  </div>
                  <div class="addthis_inline_share_toolbox_vyce" style="text-align: left;"></div>
                </div>
              </div>
              <div id="title_tab_scroll_pro" style="margin-top:0px;">
                <a href="#tab2" class="current">Giới thiệu sản phẩm</a>
                <a href="#tab1">Thông số kỹ thuật</a>
              </div>
              <!--title_tab_scroll_pro-->
              <div class="clear"></div>
              <div id="tab2" class="content_scroll_tab">
                {!! $dataPro->infor !!}
                <div class="clear"></div>
              </div>
              <div id="tab1" class="content_scroll_tab" style="display:block;">
               
                  {!! $dataPro->content !!}
                <div class="clear"></div>
              </div>
            </div>
            <!-- end left bar -->
            <div class="right-bar">
              <div class="box_right pt-10">
                <div class="title_box_right">
                  <strong>Sản phẩm khác</strong>
                </div>
                <div class="content_box_right">
                  <div class="page_inside product-list product_list" id="similar-product-list">
                    <ul class="ul">
                      @foreach ($dataProOther as $element)
                        <div class="item">
                          <div class="p-cointainer">
                            {{-- <div class="p-sku">MOSS017</div> --}}
                            <a class="p-img" href="{{ url('chi-tiet/'.$element->url) }}"><img class="img-fluid" src="{{ asset('./uploads/images/products/'.$element->image) }}" ></a>
                            <h4 class="p-name"><a href="{{ url('chi-tiet/'.$element->url) }}">{{ $element->name }}</a></h4>
                            @if ($element->promotional_price > 0)
                              <div class="p_price">
                                <i>{{ number_format($element->promotional_price) }}</i>
                                <span class="current-price">{{ number_format($element->promotional_price) }}</span>
                                <div class="p_old_price">{{ number_format($element->price) }}</div>
                              </div>
                            @else
                            <div class="p_price" style="margin-right: 30px;">
                              <i>{{ number_format($element->price) }}</i>
                              <span class="current-price">{{ number_format($element->price) }}</span>
                            </div>
                            @endif
                          </div>
                        </div>
                      @endforeach
                     
                    </ul>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              <div class="box_right pt-10">
                <div class="title_box_right">
                  <strong>Giá tương đương</strong>
                </div>
                <div class="content_box_right">
                  <div class="page_inside product-list product_list" id="similar-product-list">
                    <ul class="ul">
                      @foreach ($dataProPriceSame as $element)
                        <div class="item">
                          <div class="p-cointainer">
                            {{-- <div class="p-sku">MOSS017</div> --}}
                            <a class="p-img" href="{{ url('chi-tiet/'.$element->url) }}"><img class="img-fluid" src="{{ asset('./uploads/images/products/'.$element->image) }}" ></a>
                            <h4 class="p-name"><a href="{{ url('chi-tiet/'.$element->url) }}">{{ $element->name }}</a></h4>
                            @if ($element->promotional_price > 0)
                              <div class="p_price">
                                <i>{{ number_format($element->promotional_price) }}</i>
                                <span class="current-price">{{ number_format($element->promotional_price) }}</span>
                                <div class="p_old_price">{{ number_format($element->price) }}</div>
                              </div>
                            @else
                            <div class="p_price" style="margin-right: 30px;">
                              <i>{{ number_format($element->price) }}</i>
                              <span class="current-price">{{ number_format($element->price) }}</span>
                            </div>
                            @endif
                          </div>
                        </div>
                      @endforeach
                    </ul>
                  </div>
                  <!--prouduct_list-->
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection