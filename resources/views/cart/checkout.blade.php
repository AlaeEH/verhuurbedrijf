@extends('layouts.layout')
@section('title')
Laravel Shopping Cart
@endsection
@section('content')

{{-- {{$user = auth()->user()}} --}}
</br>
<div class="card-uper">
    <div class="card-header">Checkout</div>
    @if (!empty($fail))
        <h1 class="bg-danger">{{$fail}}</h1>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <div class="card-body">
        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" required name="first_name" value="{{$user['first_name']}}">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" required name="last_name" value="{{$user['last_name']}}">    
            </div>
            <div class="form-group">
                <label for="terminal">Pickup/Return Terminal</label>
                <select class="form-control" name="terminal" value="{{ old('terminal') }}">
                    <option value="Amsterdam Central Station">Amsterdam Central Station</option>
                    <option value="Amsterdam Bijlmer Arena">Amsterdam Bijlmer Arena</option>
                </select>
            </div>
            <div class="form-group">
                <label for="card-expiry-month">Pick-up date and time:</label>
                <input id="today" class="form-control" type="datetime-local" name="start" value="{{ old('start') }}" required>
            </div>
            <div class="form-group">
                <label for="card-expiry-year">Return date and time:</label>
                <input class="form-control" type="datetime-local" name="end" value="{{ old('end') }}" required>
            </div>
            
            <h4 name="price">Total Price: ${{ $total }}</h4>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Buy now</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>

@endsection