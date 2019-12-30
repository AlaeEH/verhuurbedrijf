@extends('products.layout')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <title>Product</title>
    </head>
    <body>
        </br></br>
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Search</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            {{-- <div class="float-right"><a href="products/create"><button  type="button" class="btn btn-success">Create a new product!</button></a></div> --}}
                            <input type="text" class="form-controller" placeholder="Search for a product..." id="search" name="search" value="" onkeyup="searchbar()">
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    {{--     <th>Edit</th>
                                    <th>Delete</th> --}}
                                </tr>
                            </thead>
                            <tbody id='tbody'>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><a href="{{ route('shop.show', $product) }}">{{$product->title}}</a></td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->in_stock}}</td>
                                        <td>{{$product->price}}</td>
                                        @if ($product->status === 1)
                                            <td>Yes</td>
                                        @elseif ($product->status === 0)
                                            <td>No</td>
                                        @endif
                                        {{-- <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        function searchbar() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("tbody");
            tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                        txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                    else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>
    </body>
</html>
@endsection