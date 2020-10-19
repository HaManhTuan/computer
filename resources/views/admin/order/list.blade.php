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
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="min-height-200px">
    <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-4">
        <div class="pull-left">
          <h3 class="text-blue h4">Danh sách đơn hàng</h3>
        </div>
      </div>
            <div class="pb-20">
            
              <table class="data-table table hover table-order">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Thời gian</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>TT</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                      $stt = 1;
                    @endphp
                      @foreach($orders as $orders)
                      <tr>
                          <td>{{ $stt++ }}</td>
                          <td>{{ $orders->created_at }}</td>
                          <td>
                              @foreach($orders->orders as $value)
                              {{ $value->product_name }}<br>
                              @endforeach
                              ==============================<br>
                              Khách hàng: {{ $orders->name }}
                              ==============================<br>
                              Số điện thoại: {{ $orders->phone }}
                          </td>
                          <td>{{ number_format($orders->total_price) }}</td>
                          <td>@if($orders->order_status == 1)
                              <span class="badge badge-success" style="margin-left: 10px">Mới</span>
                              @elseif($orders->order_status == 2)
                              <span class="badge badge-primary" style="margin-left: 10px">Đang xử lý</span>
                              @elseif($orders->order_status == 3)
                              <span class="badge badge-danger" style="margin-left: 10px">Đang chuyển</span>
                              @elseif($orders->order_status == 4)
                              <span class="badge badge-primary" style="margin-left: 10px">Đã chuyển</span>
                              @elseif($orders->order_status == 5)
                              <span class="badge badge-danger" style="margin-left: 10px">Đã hủy</span>
                          @endif</td>
                          <td>
                            <button class="btn btn-success" onclick="window.location.href='{{ url('admin/order/view-orderdetail/'.$orders->id) }}'"><i class="fa fa-pencil"></i></button>
                      
                          </td>
                      </tr>
                      @endforeach
                </tbody>
              </table>
              
            </div>
    </div>
  </div>
</div>
<style type="text/css" media="screen">
  .btn-edit:hover, .btn-del:hover{
    cursor: pointer;
  }
</style>
<script src="./admin/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="./admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="./admin/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="./admin/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script>
  $('.table-order').DataTable({
      scrollCollapse: true,
      autoWidth: false,
      responsive: false,
      searching: true,
      bLengthChange: true,
      bPaginate: true,
      bInfo: false,
      "columnDefs": [
          { "orderable": false, "targets": 0 },
          { "orderable": false, "targets": 5 }
          ],
      "order": [],
      "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
      "language": {
        "info": "_START_-_END_ of _TOTAL_ entries",
        searchPlaceholder: "Search",
        paginate: {
          next: '<i class="ion-chevron-right"></i>',
          previous: '<i class="ion-chevron-left"></i>'  
        }
      },
    });
</script>
@endsection