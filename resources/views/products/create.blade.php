@extends('products.layout')

@section('content')

<div class="card uper">
    <div class="card-header">
        Create a new product
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div></br>
        @endif
        <form method="post" action="{{ route('products.store') }}">
            <div class="form-group">
                @csrf
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title"/>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description"/>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" value="0" min="0" max="1000" step="1" class="form-control" name="in_stock"/>
            </div>
            Product Image:</br>
            <div class="form-group">
                <input type="file" name="product_image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" name="price"/>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                
                Active:
                <div class="form-check">&nbsp
                    <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1">
                    <label class="form-check-label" for="status"></label>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection