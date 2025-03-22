@extends('site.includes.leyout')
@section('main')
	<!-- Banner -->
	<section id="banner">
		<div class="content">
			<header>
				<h1>{{$topnews->titulo}}</h1>
				<p>{{$topnews->subtitulo}}</p>
			</header>
			<p>{{$topnews->summary}}</p>
			<ul class="actions">
				<li><a href="{{route('newsRead', ['news' => $topnews, 'slug' => $topnews->slugTitulo])}}" class="button big">Leia Mais</a></li>
			</ul>
		</div>
		@if (!empty($topnews->cover))
		<span class="image object">
			<img src="/site/images/{{$topnews->cover}}" alt="" />
		</span>
		@endif
	</section>
	
	<section>
		<header class="major">
			<h2>Ultimas Noticias</h2>
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
