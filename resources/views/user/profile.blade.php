@extends('layouts.layout')
@section('content')
<body class="bg-white">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.10.0/beautify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.10.0/beautify-css.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.10.0/beautify-html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.10.0/beautify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.10.0/beautify-css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.10.0/beautify-html.min.js"></script>
    <script src="https://cdn.rawgit.com/beautify-web/js-beautify/v1.10.0/js/lib/beautify.js"></script>
    <script src="https://cdn.rawgit.com/beautify-web/js-beautify/v1.10.0/js/lib/beautify-css.js"></script>
    <script src="https://cdn.rawgit.com/beautify-web/js-beautify/v1.10.0/js/lib/beautify-html.js"></script>
    </br>
    <h3 class="text-center">Welcome {{Auth::user()->name }}</h3>
    @foreach($orders as $order)
    <div class="">
        <h4>Your rental history:</h2>
        <table class="table bg-light table-striped custab">
            <thead>
                <tr>
                    <th>Vehicle</th>
                    <th>Quantity</th>
                    <th>Pick-up location</th>
                    <th>Pick-up date</th>
                    <th>Return date</th>
                    <th>Price (each)</th>
                </tr>
            </thead>
            @foreach($order->cart->items as $item)
                <tr>
                    <td>{{$item['item']->title }}</td>
                    <td>{{$item['qty']}}</td>
                    <td>{{$order->terminal}}</td>
                    <td>{{$order->start }}</td>
                    <td>{{$order->end }}</td>
                    <td>${{$item['item']->price }}</td>
                </tr>
            @endforeach
                <tfoot>
                    <tr>
                        <td><strong>Total price</strong></td>
                        <td class="border-top border-dark"></td>
                        <td class="border-top border-dark"></td>
                        <td class="border-top border-dark"></td>
                        <td class="border-top border-dark"></td>
                        <td class="border-top border-dark"><strong>${{$order->cart->totalPrice }}</strong></td>
                    </tr>
                </tfoot>
        </table>
        @endforeach
    </div>
</div>
</body>
@endsection