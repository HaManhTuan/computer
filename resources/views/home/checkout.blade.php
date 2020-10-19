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
.error{
  color: red;
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
<div class="right">
  <form method="post" enctype="multipart/form-data" action="{{ url('/thanhtoan') }}" onsubmit="return false;" id="form-ck">
    @csrf
    <div class="c3_col_1">
      <div class="title_box_cart">Thông tin thanh toán</div>
      <div class="content">
        <div class="label">Họ và tên *</div>
        <div class="value">
          <input type="text" name="name" id="buyer_name" value="" data-rule-required="true" data-msg-required="Vui lòng nhập tên.">
        </div>
        <!-- name -->
        <div class="label">Số điện thoại *</div>
        <div class="value">
          <input type="text" name="phone" id="buyer_tel" value="" data-rule-number="true" data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại." data-msg-number="Vui lòng nhập số điện thoại.">
        </div>
        <!-- tel -->
        <div class="label">Email (Vui lòng điền chính xác)*</div>
        <div class="value">
          <input type="text" name="email" id="buyer_email" value="" data-rule-email="true" data-rule-required="true" data-msg-required="Vui lòng nhập email." data-msg-email="Vui lòng nhập email.">
        </div>
        <!-- email -->
        <div class="label">Địa chỉ *</div>
        <div class="value">
          <input type="text"  rows="4" name="address" id="buyer_address" value="" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ.">
        </div>
        <!-- address -->
        <div class="label">Ghi chú</div>
        <div class="value">
          <textarea name="note" rows="4" id="buyer_note"></textarea>
        </div>
      </div>
      <!--content-->
    </div>
    <!--c3_col_1-->
    <div class="c3_col_1">
      <div class="title_box_cart">Hình thức thanh toán</div>
      <div class="content">
        <div class="value payment_method">
          <div class="row">
            <input type="radio" name="pay_method" value="1" onchange="paymentShow('pay0')" checked="checked">
            <span>Thanh toán tiền mặt khi nhận hàng</span>
            <div class="detail" id="pay0" style="display: none;">
              Thanh toán tiền khi nhận được hàng. Quý khách ở ngoại tỉnh sẽ chịu thêm 1% giá trị đơn hàng từ chi phí thu hộ. Quý khách ở Hà Nội được miễn phí.
            </div>
            <div class="clear"></div>
          </div>
          <div class="row">
            <input type="radio" name="pay_method" value="2" disabled="">
            <span>Thanh toán qua chuyển khoản qua tài khoản ngân hàng (khuyên dùng)</span>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <!--content-->
    </div>
    <!--c3_col_1-->
    <div class="c3_col_1 c3_col_2">
      <div class="title_box_cart"> Xác nhận đơn hàng</div>
      <div class="c3_box">
        <div class="tbl_cart3">
          <span>
            <!--
              2890000
              -->
          </span>
          <table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">
            <tbody>
              @php
                $stt =1;
              @endphp
              @foreach ($cart_data as $element)
              <tr class="js-item-row" data-variant_id="0" data-item_id="{{ $element->id }}" data-item_type="product">
                <td>{{ $stt++ }}</td>
                <td>{{ $element->name }}</td>
                <td>{{ $element->quantity }}</td>
                <td><strong class="red">{{ number_format($element->quantity * $element->price ) }} <u>đ</u></strong></td>
              </tr>
              @endforeach
              <tr class="txt_16">
                <td class="txt2 txt_right" colspan="4">
                  Tổng tiền
                  <strong class="red" id="tong-don-hang">{{ number_format($cart_subtotal) }}<u>đ</u></strong><br>
                  (Chưa bao gồm phí vận chuyển)
                </td>
              </tr>
            </tbody>
          </table>
          <div class="clear space2"></div>
          <div class="submit-form">
            <input type="submit" class="btn_red" value="Đặt hàng" style="width:100%;">
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </form>
</div>
 <div class="clear"></div>
 <script>
  $("#form-ck").validate({
    submitHandler: function(form) {
      form.submit();
    }
   });
 </script>
@endsection