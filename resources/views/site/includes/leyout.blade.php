<!DOCTYPE HTML>
<html>
	<head>
		<title>Top News</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/site/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="{{route('newsSite')}}" class="logo"><strong>Top</strong> News</a>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Banner -->

                            @yield('main')

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="get" action="{{route('buscarNews')}}">
										<input type="text" name="keyword" id="keyword" placeholder="O que voce procura?" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="{{route('newsSite')}}">Home</a></li>
										<li><a href="{{route('todasNews')}}">Todas as Noticias</a></li>
										<li>
											<span class="opener">Categorias</span>
											<ul>
												@foreach ($categoria as $category)
												<li><a href="{{route('newsCategory', $category->id)}}">{{$category->titulo}}</a></li>
												@endforeach
												
											</ul>
										</li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Destaque</h2>
									</header>
									<div class="mini-posts">
										@foreach ($desNews as $destaque)
										<article>
											@if (!empty($destaque->cover))
											<a href="{{route('newsRead', ['news' => $destaque, 'slug' => $destaque->slugTitulo])}}" class="image">
												<img src="/site/images/{{$destaque->cover}}" alt="" />
											</a>
											@endif
											<p>{{$destaque->titulo}}</p>
										</article>
										@endforeach
									</div>
									<ul class="actions">
										<li><a href="{{route('todasNews')}}" class="button">Ver Mais</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Sobre Nós</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#" target="_blank">alexandremcqueen15@gmail.com</a></li>
										<li class="icon solid fa-phone">(+244) 933-045-587</li>
										<li class="icon solid fa-home"> Avenida Fidel de Castro #8254<br />
										Angola, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Sites de Gerenciamento de Noticia © 2025</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Desenvolvido Por
							 <a href="https://github.com/alexandresimao0312" class="text-muted" target="_blank">Alexandre Sales Simão</a>. Todos Os Direitos Reservados</span>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="/site/assets/js/jquery.min.js"></script>
			<script src="/site/assets/js/browser.min.js"></script>
			<script src="/site/assets/js/breakpoints.min.js"></script>
			<script src="/site/assets/js/util.js"></script>
			<script src="/site/assets/js/main.js"></script>

	</body>
</html>