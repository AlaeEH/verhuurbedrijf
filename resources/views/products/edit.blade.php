@extends('products.layout')
@section('content')
<div class="card uper">
    <div class="card-header">
        Edit Product
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
        @endif
        <form method="post" action="{{ route('products.update', $product->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" name="title" value={{ $product->title }} />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value={{ $product->description }} />
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control" name="in_stock" value={{ $product->in_stock }} />
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" value={{ $product->price }} />
            </div>
            <div class="form-group">
                <label for="status">Active:</label> </br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="checkbox"  @if($product->status)) checked @endif class="form-check-input" name="status" value={{ $product->status }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection