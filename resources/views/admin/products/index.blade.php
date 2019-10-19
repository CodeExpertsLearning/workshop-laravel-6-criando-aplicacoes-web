@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço(R$)</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                    <form action="{{route('products.destroy', ['product' => $product->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">Nenhum Produto Cadastrado...</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{$products->links()}}

@endsection
