<div id="container_slider">
  <div id="slider">
    <div id="sync1" class="owl-carousel owl-theme">
      @foreach ($media_center as $element)
        <div class="item">
          <img border=0 src="./uploads/images/media/{{ $element->image }}"  alt=""/>
        </div>
      @endforeach
    </div>
  </div>
  <div id="right-top-home">
    <div class="banner">
      @foreach ($media_right as $element)
        <img border="0" src="./uploads/images/media/{{ $element->image }}" width="300" height="126" alt="">
      @endforeach
    </div>
  </div>
  <div class="clear space"></div>
</div>