@extends('site.includes.leyout')
@section('main')
<section>
    <header class="major">
        <h2>Noticias</h2>
    </header>
    <div class="posts">
        @foreach ($news as $item)
        <article>
            @if (!empty($item->cover))
            <a href="{{route('newsRead', ['news' => $item, 'slug' => $item->slugTitulo])}}" class="image"><img src="/site/images/{{$item->cover}}" alt="" /></a>
            @endif
            <h3>{{$item->titulo}}</h3>
            <p>{{$item->subtitulo}}</p>
            <ul class="actions">
                <li><a href="{{route('newsRead', ['news' => $item, 'slug' => $item->slugTitulo])}}" class="button">Leia</a></li>
            </ul>
        </article>
        @endforeach
    </div>
</section>
@endsection