<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Photo</title>
	<meta name="description" content="A photography-inspired website layout with an expanding stack slider and a background image tilt effect" />
	<meta name="keywords" content="photography, template, layout, effect, expand, image stack, animation, flickity, tilt" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/flickity.css" />
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<script src="js/modernizr.custom.js"></script>
</head>
<body>
<div class="container">
	<div class="hero">
		<div class="hero__back hero__back--static"></div>
		<div class="hero__back hero__back--mover"></div>
		<div class="hero__front"></div>
	</div>
	<header class="codrops-header">
		<h1 class="codrops-title">Photo<span></span></h1>
		<nav class="menu">
			{{--<a class="menu__item menu__item--current" href="#"><span>Admin</span></a>--}}
			<a class="menu__item" href="/admin"><span>Admin</span></a>
		</nav>
	</header>
	<div class="stack-slider">
		<div class="stacks-wrapper">

			@foreach( $combine as $item )
			<div class="stack">
				<h2 class="stack-title"><a href="#" data-text="Wildlife"><span>{{ $item['name'] }}</span></a></h2>
				@foreach( $item['photos'] as $photo )
				<div class="item">
					<div class="item__content">
						<img src="{{ $app_url.$photo['img'] }}" alt="img01" />
						<h3 class="item__title">{{ $photo['message'] }} <span class="item__date">{{ $photo['created_at'] }}</span></h3>
						<div class="item__details">
							<ul>
								<li><i class="icon icon-camera"></i><span>{{ $photo['camera'] }}</span></li>
								<li><i class="icon icon-focal_length"></i><span>{{ $photo['focus'] }} mm</span></li>
								<li><i class="icon icon-aperture"></i><span>&fnof;/{{ $photo['aperture'] }}</span></li>
								<li><i class="icon icon-exposure_time"></i><span>{{ $photo['shutter'] }}</span></li>
								<li><i class="icon icon-iso"></i><span>{{ $photo['ISO'] }}</span></li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@endforeach

		</div>
		<!-- /stacks-wrapper -->
	</div>
	<!-- /stacks -->
	<img class="loader" src="img/three-dots.svg" width="60" alt="Loader image" />
</div>
<!-- /container -->
<script src="js/flickity.pkgd.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/main.js"></script>
</body>
</html>