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
              <h4 class="text-blue h4">Sửa danh mục</h4>
            </div>
          </div>
           <form action="{{ url('admin/category/editPagePost/'.$detailPage->id) }}" method="POST" id="form-add" enctype='multipart/form-data'>
            @csrf
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Tên</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" id="name" placeholder="Johnny Brown" data-rule-required="true" data-msg-required="Vui lòng nhập tên danh mục." value="{{ $detailPage->name  }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Ảnh đại diện</label>
              <div class="col-sm-12 col-md-10">
                 
                <input type="hidden" name="old_file" value="{{ $detailPage->image }}">
                 <input type="file" name="file" id="file" class="dropify" 
                 accept="image/*" data-show-loader="true" data-default-file="{{ asset('./uploads/images/category/'.$detailPage->image) }}"/>
              </div>
            </div>
             <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nội dung</label>
                <div class="col-sm-12 col-md-10">
                  <textarea name="content">{!! $detailPage->content !!}</textarea>
                  <script>
                    CKEDITOR.replace('content',{
                        height: 400,
                        filebrowserUploadUrl: "{{ url('admin/category/upload')}}",
                        filebrowserUploadMethod: 'form'
                    });
                  </script>
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Trạng thái</label>
              <div class="col-sm-12 col-md-10">
                <div class="custom-control custom-checkbox mb-5">
                  <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $detailPage->status == "1" ? 'checked' : "" }}>
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
    <style>
      .error{
        color: red;
      }
    </style>
   
    <script>
     
      $(document).ready(function() {
        $(".dropify").dropify();
       $("#form-add").validate({
        submitHandler: function(form) {
          form.submit();
        }
       });
      });
    </script>
@endsection