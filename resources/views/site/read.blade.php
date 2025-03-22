@extends('site.includes.leyout')
@section('main')
<section>
    <header class="main">
        <h1>{{$news->titulo}}</h1>
    </header>

    @if (!empty($news->cover))
    <span class="image main"><img src="/site/images/{{$news->cover}}" alt="" /></span>
    @endif
    <p>{{$news->text}}</p>
    
    <hr class="major" />
</section>
@endsection