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
            <a href="{{ url('danh-muc/'.$dataCate->slug) }}" itemprop="item" class="nopad-l">
                <span itemprop="name"><h1>{{ $dataCate->name }}</h1></span> 
            </a>
            <meta itemprop="position" content="2">
        </li>
    </ol>
</div>
@endsection