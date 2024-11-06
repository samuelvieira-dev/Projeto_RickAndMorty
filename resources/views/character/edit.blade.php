@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Personagem: {{ $character->name }}</h1>

    <form action="{{ route('characters.update', $character->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Necessário para indicar que é uma atualização -->

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $character->name) }}" required>
        </div>

        <div class="form-group">
            <label for="species">Espécie</label>
            <input type="text" name="species" id="species" class="form-control" value="{{ old('species', $character->species) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Imagem</label>
            <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $character->image) }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </form>
</div>
@endsection
