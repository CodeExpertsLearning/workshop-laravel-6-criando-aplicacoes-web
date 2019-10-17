@extends('layouts.app')

@section('content')
<form action="{{route('products.update', ['product' => $product->id])}}" method="post">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input type="text" class="form-control" name="description" value="{{$product->description}}">
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input type="text" class="form-control" name="price" value="{{$product->price}}">
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
    </div>

    <div class="form-group">
        <label>Informações do Produto</label>
        <textarea name="body" class="form-control" id="" cols="30" rows="10">{{$product->body}}</textarea>
    </div>

    <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>

</form>
@endsection
