@extends('layout.admin.admin')
@section('content')
@if(Session::has('flash_message_success'))
<script>
  $(document).ready(function() {
      $.notify("{{ Session::get('flash_message_success') }}", "success");
  });
</script>
@else
<script>
  $(document).ready(function() {
      $.notify("{{ Session::get('flash_message_error') }}", "error");
  });
</script>
 @endif
 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Chi tiết đơn hàng
            </h2>
            <div class="page-breadcrumb" style="display: flex;justify-content: space-between;">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Đơn hàng</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                    </ol>
                </nav>
                 {{-- <button type="button" class="btn btn-danger pull-right" id="invice" onclick='window.location.href="{{ url('admin/order/invoice/'.$orderDetail->id) }}"'>Hóa đơn</button> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">
            <div class="card-header">
               <h5 class="card-title">Trạng thái đơn hàng
               @if($orderDetail->order_status == 1)
               <span class="badge badge-success" style="margin-left: 10px">Mới</span>
               @elseif($orderDetail->order_status == 2)
               <span class="badge badge-primary" style="margin-left: 10px">Đang xử lý</span>
               @elseif($orderDetail->order_status == 3)
               <span class="badge badge-warning" style="margin-left: 10px">Đang chuyển</span>
               @elseif($orderDetail->order_status == 4)
               <span class="badge badge-info" style="margin-left: 10px">Đã chuyển</span>
               @elseif($orderDetail->order_status == 5)
               <span class="badge badge-danger" style="margin-left: 10px">Đã hủy</span>
               @endif
               </h5>
            </div>
          <div class="card-body">
            <table class="table table-bordered ">
                  <tr>
                     <th scope="col">Ngày tạo</th>
                     <th scope="col">{{ date('d/m/Y h:i:s',strtotime($orderDetail->created_at)) }}</th>
                  </tr>
                  <tr>
                     <th scope="col">Tổng tiền</th>
                     <th scope="col">{{ number_format($orderDetail->total_price) }}</th>
                  </tr>
                  <tr>
                     <th scope="col">Hình thức thanh toán</th>
                     <th scope="col">COD</th>
                  </tr>
                  <tr>
                     <th scope="col">Chú ý </th>
                     <th scope="col">{{ ($orderDetail->note) }}</th>
                  </tr>
              </table>
          </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">
            <div class="card-header">
               <h5 class="card-title">Khách hàng
                 {{--  <span class="label label-primary btn-send-mail" style="margin-left: 10px" onclick='window.location.href="{{ url('admin/order/send-mail/'.$orderDetail->id) }}"'>Gửi Mail</span> --}}
                  <button type="button" class="btn btn-danger pull-right" id="invice" onclick='window.location.href="{{ url('admin/order/invoice/'.$orderDetail->id) }}"'>Hóa đơn</button>
               </h5>
            </div>
          <div class="card-body">
            <table class="table table-bordered ">
              <tr>
                 <th scope="col">Họ tên:</th>
                 <th scope="col">{{ $orderDetail->name }}</th>
              </tr>
              <tr>
                 <th scope="col">Số điện thoại</th>
                 <th scope="col">
                    {{ $orderDetail->phone }}
                 </th>
              </tr>
              <tr>
                 <th scope="col">Email</th>
                 <th scope="col">
                    {{ $orderDetail->email }}
                 </th>
              </tr>
           </table>
          </div>
        </div>
    </div>
{{--     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">
            <div class="card-header">
               <h5 class="card-title">Thông tin hóa đơn
                 <span class="label label-primary change-label" style="margin-left: 10px" data-toggle="modal" data-target="#edituser">Thay đổi</span>
               </h5>
            </div>
          <div class="card-body">
            <div class="list-order" style="margin-top: 10px; margin-bottom: 30px; ">
                  <p>Họ tên: {{ $customerDetail->name }}</p>
                  <p>SĐT: {{ $customerDetail->phone }} </p>
                  <p>Email: {{ $customerDetail->email }} </p>
                  <p>Địa chỉ: {{ $customerDetail->address }} </p>
            </div>
          </div>
        </div>
    </div> --}}

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">
            <div class="card-header">
               <h5 class="card-title">Trạng thái đơn hàng
                <input type="hidden" name="order_id" id="order_id" value="{{ $orderDetail->id }}">
                 <select name="order_status" id="order_status" class="form-control" style="width: 180px;margin-left: 50px;display: inline-block;"> 
                    @if ($orderDetail->order_status == 4)
                         <option value="4" selected="" disabled="">Đã chuyển</option>
                    @else
                      <option value="1">Mới</option>
                      <option value="2">Đang chờ xử lý</option>
                      <option value="3">Đang chuyển</option>
                      <option value="4">Đã chuyển</option>
                      <option value="5">Đã hủy</option>
                    @endif    
               </select>
               </h5>
            </div>

        </div>
    </div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
           <h5 class="card-title">Chi tiết</h5>
        </div>
        <div class="card-body">
            <table id="order-table" class="table table-bordered table-hover">
                    <thead>
                       <tr>
                          <th>Tên sản phẩm</th>
                          <th>Giá</th>
                          <th>Số lượng</th>
                          <th>Tổng tiền</th>
                       </tr>
                    </thead>
                    <tbody>
                       @php $total_amount = 0; @endphp
                       @foreach($orderDetail->orders as $value)
                       <tr>
                          <td>{{ $value->product_name }}</td>
                          <td>{{ number_format($value->price) }}</td>
                          <td>{{ $value->quantity }}</td>
                          <td>{{ number_format($value->price*$value->quantity) }}</td>
                       </tr>
                       <?php $total_amount = $total_amount+($value->quantity*$value->price);?>
                        <tr>
                          <td colspan="6">
                            <br>
                            <div class="total" align="right">
                              <span class="total-text">Tổng tiền : </span><span class="total-money red total-cart-price" id="total_shopping_price" style="font-size:18px">{{ number_format($total_amount) }}</span> VNĐ
                              <b style="color:red; font-size:18px;"></b>
                            </div>
                          </td>
                        </tr>
                       @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    <div class="card">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">
            <div class="card-header">
               <h5 class="card-title">Ghi chú đơn hàng</h5>
               <form action="{{ url('admin/order/log/'.$orderDetail->id) }}" method="POST">
                @csrf
                  <textarea name="log" class="form-control" rows="4">{{ $orderDetail->log  }}</textarea>
                  <button type="submit" class="btn btn-primary">Thêm</button>
               </form>
            </div>
        </div>
      </div>
    </div>
</div>
</div>
<script>
  $("#order_status option[value='" + {{ $orderDetail->order_status }} + "']").prop('selected', true);
      $('select#order_status').change(function() {
         var status = $(this).val();
         var order_id = $("#order_id").val();
         $.ajax({
             url: "{{ url('admin/order/change-status') }}",
             type: "POST",
             dataType: "JSON",
             data: {status: status, order_id: order_id  },
             headers: {
                 'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
             },
             success: function(data){
                 console.log(data);
                 if(data.status == '_success') {
                  $.notify(data.msg, "success");
                  setTimeout(function () {
                    location.reload();
                  },2000);
             }},
             error: function(err){
                 console.log(err);
             }
         });
    });
</script>
 @endsection