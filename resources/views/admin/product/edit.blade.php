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
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title">
                <h4>Danh mục sản phẩm</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Danh mục sản phẩm</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="text-blue h4">Chỉnh sửa sản phẩm</h4>
            </div>
          </div>
          <div class="pd-20">
           <form action="{{ url('admin/product/editProduct/'.$dataPro->id) }}" method="POST" id="form-add" enctype='multipart/form-data'>
            @csrf
            
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Danh mục sản phẩm</label>
                <div class="col-sm-12 col-md-10">
                  <select  class="form-control" type="text" name="category_id" id="category_id" data-rule-required="true" data-msg-required="Vui lòng nhập danh mục sản phẩm.">
                    <option value="" selected="" disabled="">-- Chọn danh mục --</option>
                   {!! $data_select !!}
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-12 col-md-10">
                  <input class="form-control" type="text" name="name" id="name" placeholder="Johnny Brown" data-rule-required="true" data-msg-required="Vui lòng nhập tên sản phẩm." value="{{ $dataPro->name }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Số lượng</label>
                <div class="col-sm-12 col-md-10">
                  <input type="text" id="stock" name="stock" class="form-control numbers" data-rule-required="true" data-msg-required="Vui lòng nhập số lượng." placeholder="Hãy nhập số lượng" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')" value="{{ $dataPro->count }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Giá</label>
                <div class="col-sm-12 col-md-10">
                  <input type="text" id="price" name="price" class="form-control numbers" data-rule-required="true" data-msg-required="Vui lòng nhập giá." placeholder="Hãy nhập giá" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')" value="{{ $dataPro->price }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Giá khuyến mại</label>
                <div class="col-sm-12 col-md-10">
                  <input type="text" id="promotional_price" name="promotional_price" class="form-control numbers" data-rule-required="true" data-msg-required="Vui lòng nhập giá km." placeholder="Hãy nhập giá km" onkeyup="this.value = number_format(this.value,0,'','.');" onblur="this.value = number_format(this.value,0,'','.')" value="{{ $dataPro->promotional_price }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Mô tả sản phẩm</label>
                <div class="col-sm-12 col-md-10">
                  <textarea name="description" class="form-control">{{ $dataPro->description }}</textarea>
                </div>
              </div>
               <script>
                    CKEDITOR.replace('description',{
                        height: 200
                    });
                </script>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Giới thiệu sản phẩm</label>
                <div class="col-sm-12 col-md-10">
                  <textarea name="content" class="form-control">{{ $dataPro->content }}</textarea>
                </div>
              </div>
                <script>
                    CKEDITOR.replace('content',{
                        height: 400,
                        filebrowserUploadUrl: "{{ url('admin/product/uploadContent')}}",
                        filebrowserUploadMethod: 'form'
                    });
                </script>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Thông số kỹ thuật</label>
                <div class="col-sm-12 col-md-10">
                  <textarea name="infor" class="form-control">{{ $dataPro->infor }}</textarea>
                </div>
              </div>
                <script>
                    CKEDITOR.replace('infor',{
                        height: 400,
                        filebrowserUploadUrl: "{{ url('admin/product/uploadInfor')}}",
                        filebrowserUploadMethod: 'form'
                    });
                </script>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Ảnh đại diện</label>
                <div class="col-sm-12 col-md-10">
                  <input type="hidden" name="old_file" value="{{ $dataPro->image }}">
                  <input type="file" name="file" id="file" class="dropify" 
                 accept="image/*" data-show-loader="true" data-default-file="{{ asset('./uploads/images/products/'.$dataPro->image) }}"/>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Trạng thái</label>
                <div class="col-sm-12 col-md-10">
                  <div class="custom-control custom-checkbox mb-5">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $dataPro->status == "1" ? 'checked' : "" }}>
                    <label class="custom-control-label" for="status">Hiển thị</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"></label>
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </div>
           </form>
          </div>
           
        </div>
      </div>
    </div>
    <style>
      .error{
        color: red;
      }
    </style>
   
    <script>
      $(document).ready(function() {
       $("#category_id option[value='" + {{ $dataPro->category_id }} + "']").prop('selected', true);
       $("#file").dropify();
       $("#filePage").dropify();
       $("#form-add").validate({
        submitHandler: function(form) {
          form.submit();
        }
       });
      });
    </script>
@endsection