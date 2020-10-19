@extends('layout.home.home_layout')
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
            <a href="{{ url('/gio-hang') }}" itemprop="item" class="nopad-l">
                <span itemprop="name"><h1>Giỏ hàng của bạn</h1></span> 
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</div>
<div class="left">
  <!-- <div class="title">1. Giỏ hàng</div> -->
  <div class="content">
    @if ($count_cart > 0)
    <table style="border-collapse:collapse; width:100%;font-size:13px;" id="tbl_list_cart">
      <tbody>
        <tr style="background-color:#f5f5f5; font-weight:bold; text-transform:uppercase;">
          <td>STT</td>
          <td>Tên sản phẩm</td>
          <td>Số lượng</td>
          <td>Đơn giá</td>
          <td>Thành tiền</td>
          <td>Xóa</td>
        </tr>
        @php
          $stt =1;
        @endphp
        @foreach ($cart_data as $element)
          <tr class="js-item-row" data-variant_id="0" data-item_id="{{ $element->id }}" data-item_type="product" style="background-color:#fff;">
              <td>
                {{ $stt++ }}
              </td>
              <td class="product_cart">
                <img src="{{ asset('./uploads/images/products/'.$element->attributes->avatar) }}">
                <div class="" style="margin-left: 120px;">
                  <a href="" style="text-decoration:none; padding-top:10px;"><span class="name">{{ $element->name }}</span></a> <br>
                </div>
              </td>
              <td>
                <input class="buy-quantity quantity-change" name="qty" value="{{ $element->quantity }}" size="5" data-id="{{ $element->id }}" data-pro = "{{ $element->attributes->product_id }}">
              </td>
              <td>
                <span class="js-show-buy-price">{{ number_format($element->price) }}</span> đ
              </td>
              <td>
                <span class="total-item-price">{{ number_format($element->quantity * $element->price) }}</span> đ
              </td>
              <td>
                <button class="btn btn-del removeCart" data-id="{{ $element->id }}">Xóa</button>
              </td>
          </tr>
        @endforeach
        <tr>
          <td colspan="6">
            <br>
            <div class="total" align="right">
              <span class="total-text">Tổng tiền : </span><span class="total-money red total-cart-price" id="total_shopping_price" style="font-size:18px">{{ number_format($cart_subtotal) }}</span> VNĐ
              <b style="color:red; font-size:18px;"></b>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="print">
      <a href="/" class="button buy-continues" style="float:right;padding: 7px 10px;">Tiếp tục mua hàng</a>
      <a id="thanhtoan" class="btn_red float_r btn_cart button" href="{{ url('/thanh-toan') }}" style="padding: 7px 10px">Đặt hàng</a>
    </div>
    @else
    <p>Giỏ hàng của bạn đang trống.</p>
    @endif

  </div>

  <div class="clear"></div>
</div>
<style>
  .btn-del{
    padding: 5px 10px;
    border: 1px;
    border-radius: 20px;
    background-color: red;
    color: #fff;
  }
</style>
<script>

    $(".removeCart").click(function(){
      let id = $(this).data('id');
      $.ajax({
        url: "{{ url('/removeCart') }}",
        type: "POST",
        dataType:"JSON",
        data: {id: id},
          headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
        success: function(data){
            if(data.status == "_success"){
                $.notify(data.msg,'success');
                location.reload();
                // $("#dd-item-"+id).remove();
                // $("tr.total-price td.total-price-td").html(number_format(data.cart_subtotal));
                // if ($(".cart_summary tbody tr").length == 0) {location.reload();}
            }
            else{
                  $.notify(data.msg,'error');
            }
        },
        error:function(err) {
                console.log(err);
            }
      });
    });
    $(".quantity-change").change(function(){
      let qty = $(this).val();
      let id = $(this).data('id');
      let product_id = $(this).data('pro');
      $.ajax({
        url: '{{ url('/cart/updateCart') }}',
        type: 'POST',
        dataType: 'JSON',
        data: {id: id, qty: qty,product_id: product_id },
        headers: {
          'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
        },
        success: function(data){
            if(data.status == "_success"){
                $.notify(data.msg,'success');
                setTimeout(function(){location.reload();},3000)
                
            }
            else{
                  $.notify(data.msg,'error');
            }
        },
        error:function(err) {
          console.log(err);
        }
      });
      

    });
</script>
@endsection