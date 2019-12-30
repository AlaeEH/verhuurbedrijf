@extends('layouts.layout')

@section('title')

Products

@endsection

@section('content')

	@if(session()->has('success'))
 		<div class="alert alert-success">{{ session()->get('success') }}</div>
	@endif	
</div>

<div class="container border rounded bg-light">
	</br>
	<h1 class="font-weight-bold text-center">Our military vehicles</h1>
	<div class="container text-center">
		Welcome to Nighthawk rental Our mission is to provide film production and special event professionals with access to the most authentic WW2 military vehicles available in the western United States. Our inventory includes World War 2 tanks, heavy armored and light soft skinned vehicles that are historically accurate and appropriate for every major theater of operation during the Second World War. We will work with your art department to ensure the paint and markings on our vehicles are correct, appropriate and "what you want" for your production. Our goal is to add value by enhancing the visual quality and historical accuracy of your project, or if you want the vehicle to be fully battle-ready we can provide the best service in ammo restock and vehicle repairs.</br></br>
		If you are looking for a vehicle that is not listed below, please send us an email on nighthawk@rental.com.
	</div>
	</br>
	</br>
	<div class="row">
		@foreach($product as $product)
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="card h-100">
					<img class="card-img-top" src="{{asset('../images/'.$product['product_image'])}}" alt="">
					<div class="card-body">
						<h4 class="card-title font-weight-bold" name="title">{{$product['title']}}</h4>
						<p class="card-text pull-left" name="description">{{$product['description']}}</p>
						{{-- <p class="card-text pull-left" name="in_stock">Vehicles available:&nbsp{{$product['in_stock']}}</p> --}}
						<p class="card-text pull-left font-weight-bold" name="price">Price: €{{$product['price']}}.-</p>
					</div>
					<div class="card-footer">
						<a class="btn btn-primary float-left" href="{{ route('shop.show', $product) }}">Find out more!</a>
						<p class="btn-holder"><a href="{{ route('addToCart', $product['id']) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection