@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Personagens Salvos</h1>

    <div class="row mt-3">
        @foreach ($characters as $character)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ $character->image }}" class="card-img-top" alt="{{ $character->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $character->name }}</h5>
                    <p class="card-text">Espécie: {{ $character->species }}</p>
                    <a href="{{ route('characters.show', $character->id) }}" class="btn btn-primary">Ver Detalhes</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
