<script>
    $( document ).ready(function(){

        $(".seeInside").click(function(){
            var id = $(this).attr("data-id");
            $.get( "inside/" + id, function( data ) {
                $( "#modalInside .modal-content" ).html( data );
                $('#modalInside').modal('show');
            });
        });

        $("#paypalBtn").on("click",function(){
            $.get( "cart/" + $(this).attr('data-id'), function(data) {
                console.log(data);
                $("#modal").modal('hide');
            });
        });
    });
</script>

<div class="modal-header">
    <h3 class="modal-title">{!!$booq->bq_title!!}</h3>
    <div class="autor">{{$booq->bq_author}}</div>
</div>
<div class="modal-body">
    <div class="row">
    	<div class="col-sm-12 col-md-5">
            <img class="img-responsive filet" src="imgs/{{$booq->bq_cover_filename}}" />
            @if ($haveInteriors)
                <div class="seeInside" data-id="{{$booq->bq_id}}" ng-click="openModal(book)">See inside</div>
            @endif
            <div class="seeInside" ng-if="isTableContent() == true"><a href="imgs/tablesContent/{{$booq->bq_tableContent_filename}}" target="_blank">Table of contents</a></div>
            {{--<div ng-if="haveVideo() == true" style="margin-top:20px;" class="embed-responsive embed-responsive-4by3" ng-bind-html="book.video | escape"></div>--}}
        </div>
    	<div class="col-sm-12 col-md-7">
    		<div class="desc">{!!$booq->description!!}</div>
    		<div class="data">
    		    @if ($isOld)
    		        Available
    		    @else
    		        Pub. date: {{ date('F Y', strtotime($booq->bq_pub_date)) }}
    		    @endif
            </div>
    		<div class="row">
		    	<div class="col-xs-12">{{$booq->bq_size_cm}} cm<br/>
                                       {{$booq->bq_size_inch}} in<br/>
                                       {{$booq->co_type}}<br/>
                                       {{$booq->bq_pages}} pages<br/>
                    @if (!is_null($booq->bq_colorfull))
                        <span ng-if="isSetColorfull() == true">{{$booq->bq_colorfull}} colorfull images<br/></span>
                    @endif
                    @if (!is_null($booq->bq_bw))
                        <span ng-if="isSet() == true">{{$booq->bq_bw}} b&w images<br/></span>
                    @endif
                    @if (!is_null($booq->available))
                        <span ng-if="isSetAvailable() == true">Available also in: {{$booq->available}}<br/></span>
                    @endif
                    @foreach($isbns as $isbn)
                        <span style="text-transform: uppercase;">ISBN {{$isbn->lang}}: <span class="isbn">{{$isbn->isbn}}</span><br/>
                    @endforeach
                </div>
		    	<div class="col-xs-12 col-sm-5 text-right"></div>
		    </div>
            <div class="row">
                <div class="col-xs-5 col-xs-offset-6 text-right" style="position:relative;top:-27px;">Price: <span class="preu">{{$booq->bq_price}}&euro;</span></div>
            </div>
    	</div>
    </div>
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-xs-7">

        </div>
        <div class="col-xs-5">
            <button class="btn pull-right" data-dismiss="modal">Close</button>
            <div>
                <div class="pull-right" id="paypalBtn" data-id="{{$booq->bq_id}}" style="margin-right:20px;cursor: pointer;">
                    <img src="imgs/paypalBtn.jpg"/>
                </div>
            </div>
        </div>
    </div>

</div>