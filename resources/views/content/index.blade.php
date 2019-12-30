@extends('layouts.layout')
@section('title')
NightHawk Rental
@endsection
@section('content')
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<style>
		body {
			background-image: url(../images/voorlogo2.jpg);
			background-size: cover;
		}

		.foto {
			overflow: hidden;
			width: 100vw;
			height: 93vh;
		}
	</style>
	<body>
		</br>
		<div class="card col">
		</br>
			Welcome to Nighthawk Rental. Our mission is to provide film production and special event professionals with access to the most authentic WW2 military vehicles available in the western United States. Our inventory includes World War 2 tanks, heavy armored and light soft skinned vehicles that are historically accurate and appropriate for every major theater of operation during the Second World War. We will work with your art department to ensure the paint and markings on our vehicles are correct, appropriate and "what you want" for your production. Our goal is to add value by enhancing the visual quality and historical accuracy of your project.
			</br></br>
			All of our military vehicles are owned by collectors who have painstakingly restored them to their original running condition. Every vehicle is expertly maintained and guaranteed to run and perform to its original performance parameters for use in your film or event. Every vehicle rental includes a fully qualified driver trained to ensure the safe, reliable operation of our vehicles while meeting the performance expectations of your production or event staff. We have our own in house heavy transport capabilities available, or you can use your own licensed and insured heavy vehicle transport company.
			</br></br>
			Nighthawk Rental. can, on request, provide expert research and technical advisory services on all aspects of World War 2 including vehicles, weapons, tactics, personnel and uniforms. We have a licensed professional armorer on call to provide the historically accurate small arms appropriate for use on our vehicles, or we will work closely with your armorer to provide the necessary vehicle mounted small arms and ensure the safe and successful completion of your production or event.
		</br></br>
		</div>
		</br></br></br>
		<div class="card">
			<div class="container py-xl-5 py-lg-3">
				<div class="row py-4 posi-w3ls-bottom">
					<div class="col-lg-4 bottom-w3ls1">
						<h4 class="mb-4">Trained Professionals</h4>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
						<img id="kleineFoto" src="{{url('../images/prof.png')}}">
					</div>
					<div class="col-lg-4 bottom-w3ls1 my-lg-0 my-5">
						<h4 class="mb-4">Perfect Quality</h4>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
						<img id="kleineFoto1" src="{{url('../images/quality.png')}}">
					</div>
					<div class="col-lg-4 bottom-w3ls1">
						<h4 class="mb-4">Best Products Used</h4>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
						<img id="kleineFoto2" src="{{url('../images/products.png')}}">
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>
@endsection