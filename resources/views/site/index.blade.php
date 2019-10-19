@extends('layouts.site')

@section('content')

<div class="row">
    @forelse($products as $product)
        <div class="col-4 card">
            <img src="https://via.placeholder.com/680x480" alt="" class="card-img-top img-fluid">

            <div class="card-body">
                <h2 class="card-title">{{$product->name}}</h2>
                <p class="card-text">{{$product->description}}</p>

                <h3>R$ {{number_format($product->price, 2, ',', '.')}}</h3>

                <a href="{{route('single', ['slug' => $product->slug])}}" class="btn btn-success btn-lg">
                    Ver Produto
                </a>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">Nenhum produto cadastrado...</div>
    @endforelse
</div>

@endsection
