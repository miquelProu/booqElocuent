@extends('app')

@section('content')

<script>
    $( document ).ready(function(){
         if ($( "#cartDetail" ).children().length <= 0) {
             $.get( "cartDetail", function( data ) {
                $( "#cartDetail" ).html( data );
            });
        }
    });
</script>
<div class="container-fluid cart">
    <div class="row">
        <div id="cartDetail" class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">

        </div>
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
