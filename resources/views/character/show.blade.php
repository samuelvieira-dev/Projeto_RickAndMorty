@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px;">
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $character['name'] }}</h3>
                        <p><strong>Espécie:</strong> {{ $character['species'] }}</p>
                        <p><strong>Gênero:</strong> {{ $character['gender'] }}</p>
                        <p><strong>Localização:</strong> {{ $character['location']['name'] }}</p>

                        @if ($savedCharacter)
                            <!-- Botão para excluir o personagem -->
                            <form action="{{ route('character.delete', $savedCharacter->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir do Banco</button>
                            </form>
                            <!-- Botão para editar o personagem -->
                            <a href="{{ route('character.edit', $savedCharacter->id) }}" class="btn btn-secondary">Editar Informações</a>

                        @else
                            <!-- Botão para salvar o personagem no banco -->
                            <form action="{{ route('character.save') }}" method="POST">
                                @csrf
                                <input type="hidden" name="name" value="{{ $character['name'] }}">
                                <input type="hidden" name="species" value="{{ $character['species'] }}">
                                <input type="hidden" name="image" value="{{ $character['image'] }}">
                                <input type="hidden" name="url" value="{{ $character['url'] }}">
                                <input type="hidden" name="id" value="{{ $character['id'] }}">
                                <button type="submit" class="btn btn-primary">Salvar no Banco</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
