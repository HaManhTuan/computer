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
          <h3 class="text-blue h4">Danh sách danh mục sản phẩm</h3>
        </div>
        <div class="pull-right">
          <a href="{{ url('admin/category/add-category') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
        </div>
      </div>
          <div class="pb-20">
              <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Danh mục sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Page khác</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="home" role="tabpanel">
                    <div class="pd-20">
                      @if ($dataCate->count() > 0)
                        <table class="data-table table hover nowrap table-cate">
                          <thead>
                            <tr>
                              <th class="datatable-nosort">TT</th>
                              <th class="datatable-nosort">Tên</th>
                              <th class="datatable-nosort">Ảnh</th>
                              <th>Trạng thái</th>
                              <th>Ngày tạo</th>
                              <th class="datatable-nosort">Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $stt =1;
                            @endphp
                            @foreach ($dataCate as $record)
                            <tr>
                              <td>{{ $stt++ }}</td>
                              <td class="table-plus">{{ $record->name }}</td>
                              <td> 
                                @if(isset($record->image) && $record->image != "")
                                <img src="{{ asset('./uploads/images/category/'.$record->image) }}" width="100">
                                @endif
                              </td>
                              
                              <td>
                                @if ($record['status'] == "1")
                                <span class="badge badge-success mr-1">Hiển thị</span>
                                @else
                                <span class="badge badge-danger mr-1">Ẩn</span>
                                @endif
                              </td>
                              <td>
                                {{$record->created_at}}
                              </td>
                              <td>
                                <div class="dropdown">
                                  <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item btn-edit" href="{{ url('admin/category/edit-category/'.$record->id) }}"><i class="dw dw-edit2"></i> Sửa</a>
                                    <a class="dropdown-item btn-del" data-id="{{ $record->id }}"><i class="dw dw-delete-3"></i> Xóa</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel">
                    <div class="pd-20">
                      @if ($dataPage->count() > 0)
                        <table class="data-table table hover nowrap table-cate">
                          <thead>
                            <tr>
                              <th class="datatable-nosort">TT</th>
                              <th class="datatable-nosort">Tên</th>
                              <th>Trạng thái</th>
                              <th>Ngày tạo</th>
                              <th class="datatable-nosort">Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $stt =1;
                            @endphp
                            @foreach ($dataPage as $record)
                            <tr>
                              <td>{{ $stt++ }}</td>
                              <td class="table-plus">{{ $record->name }}</td>
                              <td>
                                @if ($record['status'] == "1")
                                <span class="badge badge-success mr-1">able</span>
                                @else
                                <span class="badge badge-danger mr-1">disable</span>
                                @endif
                              </td>
                              <td>
                                {{$record->created_at}}
                              </td>
                              <td>
                                @if ($record['status'] == "1")
                                <a href="{{ url('/'.$record->slug) }}" class="btn btn-primary" target="blank"><i class="icon-copy fa fa-eye" aria-hidden="true"></i></a>
                                @endif
                                <a href="{{ url('admin/category/edit-page/'.$record->id) }}" class="btn btn-success"><i class="icon-copy fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="" class="btn btn-danger btn-del-page" data-id="{{ $record->id }}"><i class="icon-copy fa fa-trash" aria-hidden="true"></i></a>
                                
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
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
  $('document').ready(function(){
    $('.table-cate').DataTable({
      scrollCollapse: true,
      autoWidth: true,
      responsive: true,
      searching: true,
      bLengthChange: true,
      bPaginate: true,
      bInfo: false,
      "columnDefs": [
          { "orderable": false, "targets": 0 },
          { "orderable": false, "targets": 1 },
          { "orderable": false, "targets": 2 }
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
  });
  $(document).on('click', '.btn-del', function () {
        let id = $(this).attr('data-id');
        Swal({
            title: 'Xác nhận xóa?',
            type: 'error',
            html: '<p>Bạn sắp xóa 1 mục.</p><p>Bạn có chắn chắn muốn xóa?</p>',
            showConfirmButton: true,
            confirmButtonText: '<i class="ti-check" style="margin-right:5px"></i>Đồng ý',
            confirmButtonColor: '#ef5350',
            cancelButtonText: '<i class="ti-close" style="margin-right:5px"></i> Hủy bỏ',
            showCancelButton: true,
            focusConfirm: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value == true) {
                $.ajax({
                    url: '{{ url('admin/category/delete') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        length: '1'
                    },
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    },
                    success: function (data) {
                        //console.log(data);
                        if (data.status == '_success') {
                            Swal({
                                title: data.msg,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: 'success',
                                timer: 2000
                            }).then(() => {
                               location.reload();
                               
                            });
                        } else {
                            Swal({
                                title: data.msg,
                                showCancelButton: false,
                                showConfirmButton: true,
                                confirmButtonText: 'OK',
                                type: 'error'
                            });
                        }
                    },
                    error: function (err) {
                        //console.log(err);
                        Swal({
                            title: 'Error ' + err.status,
                            text: err.responseText,
                            showCancelButton: false,
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            type: 'error'
                        });
                    }
                });
            }
            return false;
        });
        return false;
  });
    $(document).on('click', '.btn-del-page', function () {
        let id = $(this).attr('data-id');
        Swal({
            title: 'Xác nhận xóa?',
            type: 'error',
            html: '<p>Bạn sắp xóa 1 mục.</p><p>Bạn có chắn chắn muốn xóa?</p>',
            showConfirmButton: true,
            confirmButtonText: '<i class="ti-check" style="margin-right:5px"></i>Đồng ý',
            confirmButtonColor: '#ef5350',
            cancelButtonText: '<i class="ti-close" style="margin-right:5px"></i> Hủy bỏ',
            showCancelButton: true,
            focusConfirm: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value == true) {
                $.ajax({
                    url: '{{ url('admin/category/deletePage') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        length: '1'
                    },
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    },
                    success: function (data) {
                        //console.log(data);
                        if (data.status == '_success') {
                            Swal({
                                title: data.msg,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: 'success',
                                timer: 2000
                            }).then(() => {
                               location.reload();
                               
                            });
                        } else {
                            Swal({
                                title: data.msg,
                                showCancelButton: false,
                                showConfirmButton: true,
                                confirmButtonText: 'OK',
                                type: 'error'
                            });
                        }
                    },
                    error: function (err) {
                        //console.log(err);
                        Swal({
                            title: 'Error ' + err.status,
                            text: err.responseText,
                            showCancelButton: false,
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            type: 'error'
                        });
                    }
                });
            }
            return false;
        });
        return false;
  });
</script>
@endsection