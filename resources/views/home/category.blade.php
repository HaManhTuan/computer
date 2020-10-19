@extends('layout.home.home_layout')
@section('mytitle',  ''.$dataCate->name)
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
<div class="breadcrumb mb-2 pb-2 px-md-0">
  <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a href="{{ url('') }}" itemprop="item" class="nopad-l">
                <span itemprop="name">Trang chủ</span>
            </a> 
            <meta itemprop="position" content="1">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a href="{{ url('danh-muc/'.$dataCate->slug) }}" itemprop="item" class="nopad-l">
                <span itemprop="name"><h1>{{ $dataCate->name }}</h1></span> 
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</div>
<div class="content-right">
  <div id="content_center">
    <div class="title_box_center page_detail">
      <b class="h_title">{{ $dataCate->name }}</b>
      <div class="sort-by">
       
        <select class="sorter-options" onchange="window.location.href=this.value;">
          <option value="" disabled="" selected="">Sắp xếp theo</option>
          <option value="{{ url('danh-muc/'.$dataCate->slug) }}/new" >Mới nhất</option>
          <option value="{{ url('danh-muc/'.$dataCate->slug) }}/asc">Giá tăng dần</option>
          <option value="{{ url('danh-muc/'.$dataCate->slug) }}/desc">Giá giảm dần</option>
          <option value="{{ url('danh-muc/'.$dataCate->slug) }}/view">Lượt xem</option>
        </select>
      </div>
    </div>
  </div>
  <div class="page_inside product-list product_list tool-show">
    <ul class="ul">
      @foreach ($dataPro as $element)
        <div class="item wow bounceInUp" data-wow-delay="0.{{ $element->id }}s" >
          <div class="p-cointainer">
            {{-- <div class="p-sku"></div> --}}
            <a class="p-img" href="{{ url('chi-tiet/'.$element->url) }}"><img class="img-fluid" src="{{ asset('./uploads/images/products/'.$element->image) }}">
            </a>
            <h4 class="p-name"><a href="{{ url('chi-tiet/'.$element->url) }}">{{ $element->name }}</a></h4>
            @if ($element->promotional_price > 0)
                <div class="p_price">
                  <i>{{ number_format($element->promotional_price) }}</i>
                  <span class="current-price">{{ number_format($element->promotional_price) }}</span>
                  <div class="p_old_price">{{ number_format($element->price) }}</div>
                </div>
              @else
                <div class="p_price" style="margin-right: 46px;">
                  <i>{{ number_format($element->price) }}</i>
                  <span class="current-price">{{ number_format($element->price) }}</span>
                </div>
              @endif
             <div class="add-to-cart">
                  <a title="Add to Cart" class="addTocart" data-id="{{ $element->id }}">Mua hàng</a>
              </div>
          </div>
        </div>
      @endforeach
    </ul>
  </div>
  <div class="clear"></div>
  {{ $dataPro->links('home.paginate') }}
</div>
<div id="content_left">
  <div class="box_left">
    <div class="title_box_left">
      <img src="cat_8f19872dc70213fe6ff5287fd8d117f3.png" alt="Laptop - Máy Tính Xách Tay">
      <h2>Danh mục sản phẩm</h2>
    </div>
    <div class="content_box">
      <ul class="ul">
        @foreach ($listCate0 as $element)
          <li>» <a href="{{ url('danh-muc/'.$element->slug) }}">{{ $element->name }}</a> </li>
        @endforeach
      </ul>
    </div>
  </div>
  <!--box_left-->
{{--   <div class="box_left filter">
    <div class="title_box_left black">
      <h2>Hãng sản xuất</h2>
    </div>
    <div class="content_box">
      <ul class="ul">
        <li><input class="" type="checkbox" onclick="window.location='https://minhancomputer.com/laptop-may-tinh-xach-tay.html?brand=7'"> <a href="https://minhancomputer.com/laptop-may-tinh-xach-tay.html?brand=7">Dell</a> <span>(67)</span></li>
        <li><input class="" type="checkbox" onclick="window.location='https://minhancomputer.com/laptop-may-tinh-xach-tay.html?brand=15'"> <a href="https://minhancomputer.com/laptop-may-tinh-xach-tay.html?brand=15">MSI</a> <span>(6)</span></li>
      </ul>
    </div>
  </div> --}}
  <!--box_left-->
</div>
<div class="clear"></div>
<script>

</script>
@endsection