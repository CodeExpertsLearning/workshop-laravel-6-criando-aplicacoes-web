@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço(R$)</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3">Nenhum Produto Cadastrado...</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
