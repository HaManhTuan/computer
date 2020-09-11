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
                <h4>Hình ảnh</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hình ảnh</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="text-blue h4">Sửa hình ảnh</h4>
            </div>
          </div>
           <form action="{{ url('admin/media/editMedia/'.$detailMed->id) }}" method="POST" id="form-add" enctype='multipart/form-data'>
            @csrf

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Tên ảnh</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" id="name" placeholder="Johnny Brown" data-rule-required="true" data-msg-required="Vui lòng nhập tên danh mục." value="{{ $detailMed->name  }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Ảnh đại diện</label>
              <div class="col-sm-12 col-md-10">
                 
                  <input type="hidden" name="old_file" value="{{ $detailMed->image }}">
                 <input type="file" name="file" id="file" class="dropify" 
                 accept="image/*" data-show-loader="true" data-default-file="{{ asset('./uploads/images/media/'.$detailMed->image) }}"/>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Vị trí</label>
              <div class="col-sm-12 col-md-10">
              <select name="position" class="form-control" id="position">
                <option value="1">1-Banner-Center</option>
                <option value="2">2-Banner-Right</option>
              </select>
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
      $("#position option[value='" + {{ $detailMed->position }} + "']").prop('selected', true);
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