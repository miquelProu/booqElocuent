@extends('app')

@section('content')
<div class="container-fluid catalogues">
    <div class="row">
    @foreach($catalogues as $catalogue)
        <a class="catalogue col-md-2 col-sm-3 col-xs-4" href="imgs/catalogue/{{$catalogue->pdf}}.pdf" target="_blank">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 imatge">
                    <div class="mes"><img style=""src="imgs/creu.png"/></div>
                    <img class="img-responsive filet" src="imgs/catalogue/{{$catalogue->image}}.jpg"/>

                </div>
            </div>
            <div class="row texte">
                <div class="col-xs-10 col-xs-offset-1 text-left titol">{!!$catalogue->title!!}</div>
            </div>
        </a>
    @endforeach
    </div>
</div>
@endsection
