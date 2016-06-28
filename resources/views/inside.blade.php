<script>


$(document).ready(function(){
  var slider = $('#carouselCont').bxSlider({
    adaptiveHeight: true,
    preloadImages: 'all',
    pager : false,
    nextSelector: '#slider-prev',
    prevSelector: '#slider-next',
    nextText: '&gt;',
    prevText: '&lt;'
  });

  setTimeout(function() {slider.reloadSlider();}, 200);
});

</script>

<div class="modal-body modalInside">
    <div class="tancar" data-dismiss="modal">X</div>
    <div class="xcol-xs-12 carouselCont">
        <ul class="xslide" id="carouselCont">
            @foreach($inside as $in)
                <li>
                    <img src="imgs/interiors/{{$in->ii_filename}}" />
                </li>
            @endforeach
        </ul>

    </div>
    <div id="slider-next" class="left"></div>
    <div id="slider-prev" class="right"></div>
</div>