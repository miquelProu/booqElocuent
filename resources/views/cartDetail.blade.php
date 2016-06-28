@if (is_null($carts))
    <div>NO HI HA CARRO</div>
@else
<script>
    $( document ).ready(function(){

        $(".detail").click(function(){
            var id = $(this).parent().attr("data-id");

            $.get( "detail/" + id, function( data ) {
                $( "#modal .modal-content" ).html( data );
                $('#modal').modal('show');
            });
        });

        $(".counter").click(function(){
            var id = $(this).parent().parent().parent().attr("data-id");
            if($(this).hasClass("add")){
                $.get( "cart/" + id, function(data) {console.log(data);})
                      .done(function() {
                        refresh();
                      });
            } else {
                $.get( "remove/" + id, function(data) {console.log(data);})
                        .done(function() {
                            refresh();
                          });
            }
        });

        $("#shippingSelect").on('change', function(){
            $.get( "changeShipping/" + $(this).val(), function(data) {console.log(data);})
              .done(function() {
                refresh();
              });
        });
    });

    function refresh(){
        $.get( "cartDetail", function( data ) {
            $( "#cartDetail" ).html( data );
        });
    }
</script>

<?php $sumador = 0; $qty = 0;?>

@foreach($carts as $i => $cart)
    <div class="row item xvertical-align" data-id="{{$cart->bq_id}}">

        <div class="col-xs-2 img detail">
            <img class="img-responsive filet" src="imgs/{{$cart->bq_cover_filename}}" />
        </div>
        <div class="col-xs-6 title">
            <div class="detail">{!!$cart->bq_title!!}</div>
            <div class="col-xs-6" style="padding: 0;padding-top:10px;">
            <select id="" class="form-control">
                @foreach($cartISBN[$i] as $isb )
                <option value="{{$isb->isbn}}">{{$isb->isbn}}&nbsp;({{$isb->lang}})</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="col-xs-2 contador">
            <div class="btn-group" role="group">
                <button id="add" type="button" class="btn btn-default counter add">+</button>
                <button id="count" type="button" class="btn btn-default counter add">{{$count[$i]["count"]}}</button>
                <button id="substract" type="button" class="btn btn-default counter substract">-</button>
            </div>
        </div>
        <div class="col-xs-1">
            <div class="priceByBooq">{{$cart->bq_price}}&euro;</div>
        </div>
        <div class="col-xs-1">
            <div class="price">{{$cart->bq_price * $count[$i]["count"]}}&euro;</div>
        </div>
    </div>
    <?php $sumador = $sumador + $cart->bq_price * $count[$i]["count"]?>
    <?php $qty = $qty + $count[$i]["count"]?>
@endforeach

    <div class="row item text-right total">
        <div class="col-xs-12">
            <span>Subtotal:&nbsp;</span>
            <span>{{$sumador}}&euro;</span>
        </div>
    </div>
    <div class="row item total text-right">
        <div class="col-xs-5 col-xs-offset-5">
            <select class="form-control" id="shippingSelect">
            @foreach($shipingOpt as $i => $opt)
                <option value="{{$i}}" {{ ($shipping == $i) ? "selected='selected'" : ""}}>{{$opt}}</option>
            @endforeach
            </select>
        </div>
        <?php
            $shipCost = 0;
            if ($shipping == 1){
                $shipCost = $qty * 5;
            } elseif ($shipping == 2) {
                $shipCost = ($qty * 5) + 5;
            } elseif ($shipping == 3){
                $shipCost = ($qty * 5) + 10;
            } elseif ($shipping == 4) {
                $shipCost = ($qty * 10) + 15;
            }
        ?>
        <div class="col-xs-2" style="margin-top:5px;">Transport:&nbsp;{{$shipCost}}&euro;</div>
    </div>
    <div class="row item text-right total totalsum">
        <div class="col-xs-12">
            <span>Total:&nbsp;</span>
            <span>{{$sumador + $shipCost}}</span>
        </div>
    </div>
    <div class="row text-right" style="margin-top: 40px;">
        <form method="post" name="cart" action="https://www.paypal.com/cgi-bin/webscr">
          <input type="hidden" name="cmd" value="_cart">
          <input type="hidden" name="upload" value="1">
          <input type="hidden" name="business" value="WB5D7K4BDV452">
          <input type="hidden" name="lc" value="GB">
          <input type="hidden" name="currency_code" value="EUR">
          <input type="hidden" name="button_subtype" value="services">
          {{--<input type="hidden" name="notify_url" value="http://newzonemedia.com/henry/ipn.php" />--}}
          <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
          {{--<input type="hidden" name="return" value="http://www.mysite.org/thank_you_kindly.html" />--}}

            @foreach($carts as $i => $cart)
                 <input type="hidden" name="item_name_{{$i + 1}}" value="{{$cart->bq_title}}"/>
                 <input type="hidden" name="amount_{{$i + 1}}" value="{{$cart->bq_price}}"/>
                 <input type="hidden" name="quantity_{{$i + 1}}" value="{{$count[$i]["count"]}}"/>
                 {{--<input type="hidden" name="tax_{{$i + 1}}" value="{{$i * 10}}"/>--}}

            @endforeach
          <input type="hidden" name="shipping_1" value="{{$shipCost}}"/>
          <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>
@endif