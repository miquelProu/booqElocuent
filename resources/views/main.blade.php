@extends('app')

@section('content')
<script>

    var $container;

    $( document ).ready(function(){

        $(".llibre").click(function(){
            var id = $(this).attr("data-id");

            $.get( "detail/" + id, function( data ) {
                $( "#modal .modal-content" ).html( data );
                $('#modal').modal('show');
            });
        });

        $container = $('#isotopeContainer');
        	// init
        	$container.isotope({
        	  filter: '*',
              itemSelector: '.llibre',
              percentPosition: true,
              masonry: {
                columnWidth: '.grid-sizer'
              }
            });

        $('.filtreContainer').on( 'click', '.filtre', function() {
            $('.filtreContainer .filtre').each(function(){
                $(this).removeClass('selected');
            });
            $( this ).addClass('selected');
            var filterValue = $( this ).attr('data-filter');
            $container.isotope({ filter: filterValue });
        });
    });

    $(window).on("load", function() {
        adjustHeight();
        $container.isotope({ filter: '*' });
    });

    $(window).on("resize", function() {
        $(".llibre .imatge").each(function(){
            $(this).css("height", "auto");
        });
        $(".llibre .texte").each(function(){
            $(this).css("height", "auto");
        });
        adjustHeight();
        $container.isotope('reloadItems');
    });

    function adjustHeight(){
        var height = 0;
        $(".llibre .imatge").each(function(){
            height = (height < $(this).height()) ? $(this).height() : height;
        });
        $(".llibre .imatge").each(function(){
            var temp = height - $(this).height();
            $(this).css("padding-top", temp + "px").height(height - temp);
        });

        var heightText = 0;
        $(".llibre .texte").each(function(){
            heightText = (heightText < $(this).height()) ? $(this).height() : heightText;
        });
        $(".llibre .texte").each(function(){
            $(this).height(heightText);
        });
    }
</script>
<div class="container-fluid cos">
	<div class="row clearfix" style="margin-bottom: 10px;border-bottom: 1px solid #eee;padding-bottom: 10px;">
		<div class="col-md-12">
			<div class="pull-right filtreContainer clearfix" role="group" aria-label="...">
				<div class="filtre selected" data-filter="*">Show all</div>
  				<div class="filtre" data-filter=".contemporaryarchitecture">Contemporary Architecture</div>
                <div class="filtre" data-filter=".homeinteriors">Home & Interiors</div>
  				<div class="filtre" data-filter=".fashion">Fashion</div>
                <div class="filtre" data-filter=".design">Design</div>
                <div class="filtre" data-filter=".architecturemonography">Architecture Monography</div>
  			</div>
   		</div>
	</div>

	<div class="row" id="isotopeContainer">
	    <div class="grid-sizer col-md-2 col-sm-3 col-xs-4"></div>
	@foreach($booqs as $booq)
		<div class="llibre col-md-2 col-sm-3 col-xs-4 {{strtolower($booq->category)}}" data-id="{{$booq->bq_id}}">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 imatge">
					<div class="mes"><img src="imgs/creu.png"/></div>
					<img class="img-responsive filet" src="imgs/{{$booq->bq_cover_filename}}"/>
				</div>
			</div>
			<div class="row texte">
				<div class="col-xs-10 col-xs-offset-1 text-left titol">{!!$booq->bq_title!!}</div>
			</div>
		</div>
	@endforeach
	</div>
</div>

<!-- Modal Detail-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<!-- Modal Inside -->
<div class="modal fade" id="modalInside" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

@endsection
