@extends('layout.admin.admin')
@section('content')
    <style type="text/css">
        .wrap {
            width: 100%;
        }
        .dandev-reviews {
            position: relative; 
        }
        .dandev-reviews .form_upload {
      /*      width: 320px;*/
            position: relative;
            padding: 5px;
            bottom: 0px;
            height: 40px;
            left: 0;
            z-index: 5;
            box-sizing: border-box;
            background: #f7f7f7;
            border-top: 1px solid #ddd;
        }
        
        .dandev-reviews .form_upload>label {
            height: 35px;
            width: 160px;
            display: block;
            cursor: pointer;
        }
        
        .dandev-reviews .form_upload label span {
            padding-left: 26px;
            display: inline-block;
           
            background-size: 23px 20px;
            margin: 5px 0 0 10px;
        }
        
        .list_attach {
            display: block;
            margin-top: 30px;
        }
        
        ul.dandev_attach_view {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        ul.dandev_attach_view li {
            float: left;
            width: 80px;
            margin: 0 20px 20px 0 !important;
            padding: 0!important;
            border: 0!important;
            overflow: inherit;
            clear: none;
        }
        
        ul.dandev_attach_view .img-wrap {
            position: relative;
        }
        
        ul.dandev_attach_view .img-wrap .close {
            position: absolute;
            right: -10px;
            top: -10px;
            background: #000;
            color: #fff!important;
            border-radius: 50%;
            z-index: 2;
            display: block;
            width: 20px;
            height: 20px;
            font-size: 16px;
            text-align: center;
            line-height: 18px;
            cursor: pointer!important;
            opacity: 1!important;
            text-shadow: none;
        }
        
        ul.dandev_attach_view li.li_file_hide {
            opacity: 0;
            visibility: visible;
            width: 0!important;
            height: 0!important;
            overflow: hidden;
            margin: 0!important;
        }
        
        ul.dandev_attach_view .img-wrap-box {
            position: relative;
            overflow: hidden;
            padding-top: 100%;
            height: auto;
            background-position: 50% 50%;
            background-size: cover;
        }
        
        .img-wrap-box img {
            right: 0;
            width: 100%!important;
            height: 100%!important;
            bottom: 0;
            left: 0;
            top: 0;
            position: absolute;
            object-position: 50% 50%;
            object-fit: cover;
            transition: all .5s linear;
            -moz-transition: all .5s linear;
            -webkit-transition: all .5s linear;
            -ms-transition: all .5s linear;
        }
        
        ul li,
        ol li {
            list-style-position: inside;
        }
        
        .list_attach span.dandev_insert_attach {
            width: 80px;
            height: 80px;
            text-align: center;
            display: inline-block;
            border: 2px dashed #ccc;
            line-height: 76px;
            font-size: 25px;
            color: #ccc;
            display: none;
            cursor: pointer;
            float: left;
        }
        
        ul.dandev_attach_view {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        ul.dandev_attach_view .img-wrap {
            position: relative;
        }
        
        .list_attach.show-btn span.dandev_insert_attach {
            display: block;
            margin: 0 0 20px!important;
        }
        
        i.dandev-plus {
            font-style: normal;
            font-weight: 900;
            font-size: 35px;
            line-height: 1;
        }
        
        ul.dandev_attach_view li input {
            display: none;
        }
    </style>
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
                <h4>Danh mục ảnh sản phẩm</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Danh mục ảnh sản phẩm</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="text-blue h4">Thêm mới ảnh sản phẩm</h4>
            </div>
          </div>
          <div class="pd-20">
            <div class="row">
              <div class="card">
                  <div class="card-header">
                      <h5>Thông tin sản phẩm</h5>
                  </div>
                  <div class="card-body">
                      <p> Tên sản phẩm: {{  $product->name }}</p>
                      <p> Danh mục: {{  $product->category->name }}</p>
                      <p> Ngày tạo: {{  $product->created_at }}</p>
                      <p> Số lượng: {{  $product->count }}</p>
                  </div>
              </div>
              <div class="card mt-3 col-12">
                <div class="wrap">
                    <div class="dandev-reviews">
                        <div class="form_upload">
                            <label class="dandev_insert_attach"><i class="icon-copy fa fa-image"></i><span>Đính kèm ảnh</span></label>
                        </div>
                        <div class="list_attach">
                            <ul class="dandev_attach_view">
                              @if ($productImg->count() > 0)
                               @foreach ($productImg as $element)
                                <li id="li_files_{{ $element->id }}" class="">
                                  <div class="img-wrap">
                                    <span class="close" onclick="DelImg(this,{{  $element->id  }})">×</span>
                                    <div class="img-wrap-box">
                                      <img src="{{ asset('./uploads/images/products/img/'.$element->image) }}">
                                    </div>
                                  </div>
                                </li>
                               @endforeach
                              @endif
               
                               
                            </ul>
                            <span class="dandev_insert_attach"><i class="dandev-plus">+</i></span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                  $('.dandev_insert_attach').click(function() {
                      if ($('.list_attach').hasClass('show-btn') === false) {
                          $('.list_attach').addClass('show-btn');
                      }
                      var _lastimg = jQuery('.dandev_attach_view li').last().find('input[type="file"]').val();

                      if (_lastimg != '') {
                          var d = new Date();
                          var _time = d.getTime();
                          var _html = '<li id="li_files_' + _time + '" class="li_file_hide">';
                          _html += '<div class="img-wrap">';
                          _html += '<span class="close" onclick="DelImg(this)">×</span>';
                          _html += ' <div class="img-wrap-box"></div>';
                          _html += '</div>';
                          _html += '<div class="' + _time + '">';
                          _html += '<input type="file" class="hidden"  onchange="uploadImg(this)" id="files_' + _time + '"   />';
                          _html += '</div>';
                          _html += '</li>';
                          jQuery('.dandev_attach_view').append(_html);
                          jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                      } else {
                          if (_lastimg == '') {
                              jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                          } else {
                              if ($('.list_attach').hasClass('show-btn') === true) {
                                  $('.list_attach').removeClass('show-btn');
                              }
                          }
                      }
                  });
                  function uploadImg(el) {
                    var file_data = $(el).prop('files')[0];
                    var type = file_data.type;
                    //Xét kiểu file được upload
                    var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

                    if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {

                        var fileToLoad = file_data;

                        var fileReader = new FileReader();

                        fileReader.onload = function(fileLoadedEvent) {
                            var srcData = fileLoadedEvent.target.result;

                            var newImage = document.createElement('img');
                            newImage.src = srcData;
                            var _li = $(el).closest('li');
                            if (_li.hasClass('li_file_hide')) {
                                _li.removeClass('li_file_hide');
                            }
                            _li.find('.img-wrap-box').append(newImage.outerHTML);


                        }
                        fileReader.readAsDataURL(fileToLoad);

                        //khởi tạo đối tượng form data
                        var form_data = new FormData();
                        //thêm files vào trong form data
                        form_data.append('file', file_data);
                        //sử dụng ajax post
                        $.ajax({
                            url: '{{ url('admin/product/add-productImg/'.$product->id) }}',
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            headers: {
                                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                            },
                            type: 'post',
                            success: function(res) {
                              //$.notify(res,"success");
                            }
                        });
                    } else {
                        alert('Chỉ được upload file ảnh');

                    }
                    return false;
                  }
                  function DelImg(el) {
                    console.log(el);
                    jQuery(el).closest('li').remove();

                  }
                  function DelImg(el,id) {
                    $.ajax({
                        url: '{{ url('admin/product/del-productImg') }}',
                        type: 'post',
                        dataType: 'text',
                        data: {id:id},
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                        },
                        success: function(res) {
                            location.reload();
                        }
                    });
                  }
                </script>
              </div>
            </div>
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