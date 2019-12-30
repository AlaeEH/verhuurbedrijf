@extends('layouts.layout')
@section('title')
Shopping Cart
@endsection
@section('content')
</br>
<div class="card-uper">

	@if(session()->has('success'))
 		<div class="alert alert-success">{{ session()->get('success') }}</div>
	@endif	
	<div class="card-header">Shoppingcart</div>
	<div class="card-body">
		@if(Session::has('cart'))
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th>Vehicle Number</th>
						<th>Vehicle</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Actions</th>
						<th>Actions</th>
					</tr>
				</thead>
				@foreach($products as $product)
					<tbody>
						<tr>
							<td>{{ $product['item']->id }}</td>
							<td>{{ $product['item']['title'] }}</td>
							<td>{{ $product['qty'] }}</td>
							<td>${{ $product['price'] }}</td>
							<td><a href="{{ route('reduce', ['id' => $product['item']['id']]) }}"><button type="button" class="btn btn-danger">Remove 1</button></a></td>
							<td><a href="{{ route('remove', ['id' => $product['item']['id']]) }}"><button type="button" class="btn btn-danger">Remove all</button></a></td>
						</tr>
					</tbody>
				@endforeach
				<tfoot>
					<tr>
						<td class="border-top border-dark"><strong>Total price:</strong></td>
						<td class="border-top border-dark"></td>
						<td class="border-top border-dark"></td>
						<td class="border-top border-dark"><strong>${{ $totalPrice }}</strong></td>
						<td class="border-top border-dark"></td>
						<td class="border-top border-dark"><a href="{{ route('checkout') }}" type="button" class="btn btn-success">Place Order</a></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
		@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<h2>No Items in Cart!</h2>
			</div>
		</div>
	@endif
@endsection