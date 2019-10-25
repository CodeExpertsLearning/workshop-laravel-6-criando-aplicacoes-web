@extends('layouts.site')

@section('content')
    <div class="row">

        <div class="col-12">
            @include('flash::message')
        </div>

        <div class="col-12">
            <h2>Confirmar Pedido</h2>
            <hr>
        </div>

        <div class="col-12">
            @if($products)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                    </tr>
                    <tbody>
                    @php $total = 0; @endphp

                    @foreach($products as $product)

                        @php
                            $subtotal = $product['qtd'] * $product['price'];

                            $total += $subtotal;
                        @endphp
                        <tr>

                            <td>{{$product['name']}}</td>
                            <td>{{$product['qtd']}}</td>
                            <td>R$ {{number_format($subtotal, 2, ',', '.')}}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="2"  class="text-left">Total</td>
                        <td colspan="2" class="text-left">R$ {{number_format($total, 2, ',', '.')}}</td>
                    </tr>

                    </tbody>
                    </thead>
                </table>
            @else
                <div class="alert alert-warning">Sem produtos no carrinho...</div>
            @endif
        </div>
    </div>

    <div class="col-12">

        <a href="{{route('cart.cancel')}}" class="btn btn-lg btn-danger">
            Cancelar Compra
        </a>

        <a href="{{route('checkout.confirm')}}" class="btn btn-lg btn-success">
            Realizar Pagamento
        </a>

    </div>
@endsection