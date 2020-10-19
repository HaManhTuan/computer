@extends('layout.home.home_layout')
@section('mytitle',  ''.$dataConfig->title)
@section('content')
  <!--container_slider-->
  @include('layout.home.slider')
  <!--container_slider-->
 <!--container_pro_hot-->
          <section class="product-special-home" id="special-box-home">
            <div class="title_tab">
              <a href="#tab1" class="a_tab current">Sản phẩm bán chạy</a>
              <a href="#tab2" class="a_tab">Sản phẩm mới</a>
              <a href="#tab3" class="a_tab" >Sản phẩm khuyến mãi</a>
            </div>
            <!--title_tab-->
            <div class="clear"></div>
            <div class="content_tab">
              <div class="product_list">
                <ul id="tab1" class="ul d-none" style="display: block;">
                  <div class="owl-carousel owl-theme" id="product_bestsale">
                    @foreach ($proBuy as $element)
                        <div class="item">
                          <div class="p-cointainer">
                            @if ($element->sale > 1)
                              <i class="p-sale">-{{ $element->sale }}%</i>
                            @endif
                            <a class="p-img" href="{{ url('chi-tiet/'.$element->url) }}">
                              <img class="img-fluid" src="{{ asset('./uploads/images/products/'.$element->image) }}">
                            </a>
                            <h4 class="p-name">
                              <a href="{{ url('chi-tiet/'.$element->url) }}">{{ $element->name }}</a>
                            </h4>
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
                  </div>
                </ul>
                <ul id="tab2" class="ul d-none animated bounceInRight">
                  
                  <div class="owl-carousel owl-theme" id="product_new">
                    @foreach ($proNew as $element)
                      <div class="item">
                        <div class="p-cointainer">
                            @if ($element->sale > 1)
                              <i class="p-sale">-{{ $element->sale }}%</i>
                            @endif
                          <a class="p-img" href="{{ url('chi-tiet/'.$element->url) }}">
                            <img class="img-fluid" src="{{ asset('./uploads/images/products/'.$element->image) }}">
                          </a>
                          <h4 class="p-name">
                            <a href="{{ url('chi-tiet/'.$element->url) }}">{{ $element->name }}</a>
                          </h4>
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
                  </div>
                </ul>
                <ul id="tab3" class="ul d-none animated bounceInDown">
                  
                  <div class="owl-carousel owl-theme" id="product_saleoff">
                    @foreach ($proSale as $element)
                      <div class="item">
                          <div class="p-cointainer">
                            @if ($element->sale > 1)
                              <i class="p-sale">-{{ $element->sale }}%</i>
                            @endif
                            <a class="p-img" href="{{ url('chi-tiet/'.$element->url) }}">
                              <img class="img-fluid" src="{{ asset('./uploads/images/products/'.$element->image) }}">
                            </a>
                            <h4 class="p-name">
                              <a href="{{ url('chi-tiet/'.$element->url) }}">{{ $element->name }}</a>
                            </h4>
                            @if ($element->promotional_price > 0)
                              <div class="p_price">
                                <i>{{ number_format($element->promotional_price) }}</i>
                                <span class="current-price">{{ number_format($element->promotional_price) }}</span>
                                <div class="p_old_price">{{ number_format($element->price) }}</div>
                              </div>
                            @endif

                            <div class="add-to-cart">
                                <a title="Add to Cart" class="addTocart" data-id="{{ $element->id }}">Mua hàng</a>
                            </div>
                          </div>
                      </div>
                    @endforeach
                  </div>
                </ul> 
              </div>
            </div>
          </section>
          <!--container_pro_hot-->
          <!---->
          @foreach ($dataCate->take(5) as $element)
            <section class="product-cate tool-show" id="box-product-cat-{{ $element->id }}">
                <div class="title-product-cate">
                  <a href="{{ url('danh-muc/'.$element->slug) }}">
                    <h3>{{ $element->name }}</h3>
                  </a>
                </div>
                <div class="clear"></div>
                <div class="product-home has-banner" id="product-list-home116" data-id="116">
                  @foreach ($element->products as $record)
                    <div class="item">
                      <div class="p-cointainer">
                        {{-- <div class="p-sku">0</div> --}}
                        <a class="p-img" href="{{ url('chi-tiet/'.$element->url) }}">
                          <img class="img-fluid" src="{{ asset('./uploads/images/products/'.$record->image) }}" alt=""></a>
                        <h4 class="p-name"><a href="{{ url('chi-tiet/'.$element->url) }}">{{ $record->name }}</a></h4>
                          @if ($record->promotional_price > 0)
                            <div class="p_price">
                              <i>{{ number_format($record->promotional_price) }}</i>
                              <span class="current-price">{{ number_format($record->promotional_price) }}</span>
                              <div class="p_old_price">{{ number_format($record->price) }}</div>
                            </div>
                          @else
                            <div class="p_price" style="margin-right: 46px;">
                              <i>{{ number_format($record->price) }}</i>
                              <span class="current-price">{{ number_format($record->price) }}</span>
                            </div>
                          @endif
                         <div class="add-to-cart">
                              <a title="Add to Cart" class="addTocart" data-id="{{ $record->id }}">Mua hàng</a>
                          </div>
                      </div>
                    </div>  
                  @endforeach
                 
                </div>
            </section>
          @endforeach
<div class="clear"></div>
<script>
$(".addTocart").click(function() {
   let id = $(this).data("id");
   $.ajax({
        url: "{{ url('cart/add-to-cart') }}",
        type: "POST",
        dataType: 'JSON',
        headers: {
              'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
        },
        data: {id: id},
        success: function(data){
            console.log(data);
              if (data.status =="_success") {
                    $('html, body').animate({scrollTop: 0}, 2000);
                    $("#cart").html(data['cartblock']);
                    $.notify(data.success,"success");
              }
              else
              {
                 $('html, body').animate({scrollTop: 0}, 'slow');
                  $.notify(data.msg,"error");
              }
        },
        error: function(err){
            console.log(err);
        }
    }); 
 
 });
</script>
@endsection