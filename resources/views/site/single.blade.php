@extends('layouts.site')

@section('content')
<div class="row">
    <div class="col-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-6">
        <img src="https://via.placeholder.com/680x480" alt="" class="img-fluid">
    </div>
    <div class="col-6">
        <h2>{{$product->name}}</h2>
        <h3>R$ {{number_format($product->price, 2, ',', '.')}}</h3>

        <form action="{{route('cart.add')}}" method="post">
            @csrf

            <input type="hidden" name="product[name]" value="{{$product->name}}">
            <input type="hidden" name="product[slug]" value="{{$product->slug}}">
            <input type="hidden" name="product[price]" value="{{$product->price}}">

            <div class="form-group">
                <label>Quantidade</label>
                <input type="number" name="product[qtd]" value="1">
            </div>

            <button type="submit" class="btn btn-lg btn-danger">Comprar</button>
        </form>
    </div>
</div>
@endsection
