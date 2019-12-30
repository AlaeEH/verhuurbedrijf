@extends('layouts.layout')

@section('title')

Products

@endsection

@section('content')

<div class="container border rounded bg-light">
	<h1 id="showHeader" class="font-weight-bold text-center">{{$product->title}}</h1>
	</br>
	<img id="showImage" class="card-img-top thumbnail" src="{{asset('../images/'.$product->product_image)}}" alt="">
	<p class="card-text">{{$product->description}}</p>
	<p class="card-text">{{$product->long_description}}</p>
	</br>
	<p id="price" class="card-text"><strong>Price per Unit: ${{$product->price}}</strong></p>
	<p id="addToCart" class="btn-holder"><a href="{{ route('addToCart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></p>
	</br></br></br>
	<h3>Reviews</h3>
	@foreach ($product->comment as $comment)
		<div id="divComments" class="border rounded">
			<?php echo $comment->comment?>
			<p>By: {{$comment->user->name}}</p>
		</div>
		</br>
	@endforeach
	@if(Auth::check())
		<form action="{{route('comment.store')}}" method="post" class="text-center">  @csrf  <textarea placeholder="Comment something funny.." name="comment" class="form-control"></textarea>  <input type="hidden" name="product_id" value="{{ $product['id'] }}"><br>  <input type="submit"></form>
		</br>
	@else
		<h4>To leave a comment you need to be logged in</h4>
		<a class="btn btn-primary" href="{{ route('login')}}">Log in</a>
		</br></br>
	@endif
</div>

@endsection