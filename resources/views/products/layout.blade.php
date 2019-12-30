<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<nav id="headerbro" class="navbar-expand-lg navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="{{asset('index')}}">Nighthawk Rental</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="{{asset('index')}}">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{asset('shop/products')}}">Products<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{asset('search')}}">Search<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">hier moet nog wat komen<span class="sr-only">(current)</span></a>
				</li>
			</ul>
			@auth <a class="btn btn-outline-success text-success">{{Auth::user()->name }}</a> <a href="{{asset('logout')}}">
			&nbsp
			<button class="btn btn-outline-danger">Logout</button> </a>
			@endauth
			@guest
				<a href="{{asset('login')}}">
					<button class="btn btn-outline-success">Login</button>
				</a>
				&nbsp
				<a href="{{asset('register')}}">
					<button class="btn btn-outline-success">Register</button>
				</a>
			@endguest
		</div>
</nav>
<body>
	<div class="container">
		@yield('content')
	</div>
	<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>