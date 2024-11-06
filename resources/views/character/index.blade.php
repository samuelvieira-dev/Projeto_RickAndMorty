@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Personagens</h1>
        <ul>
            @foreach ($characters as $character)
                <li>{{ $character->name }} - {{ $character->species }}</li>
            @endforeach
        </ul>
    </div>
@endsection
