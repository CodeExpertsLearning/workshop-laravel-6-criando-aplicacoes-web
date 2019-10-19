@extends('layouts.app')

@section('content')
<form action="{{route('products.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input type="text" class="form-control" name="description">
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input type="text" class="form-control" name="price">
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" name="slug">
    </div>

    <div class="form-group">
        <label>Informações do Produto</label>
        <textarea name="body" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label>Categorias</label>
        <select name="categories[]" id="" class="form-control" multiple>
            @foreach($categories  as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>

</form>
@endsection
