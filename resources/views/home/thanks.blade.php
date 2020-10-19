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
<div class="content">
  <p style="text-align: center;">Cảm ơn bạn đã mua hàng. Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất</p>
</div>
<div class="clear"></div>
<script>
  $(document).ready(function() {
    setTimeout(function() {
      window.location.href="{{ url('/') }}"
    },3000)
  });
</script>
@endsection