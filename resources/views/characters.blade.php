@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Personagens</h1>
    <button id="loadCharacters" class="btn btn-primary">Carregar Personagens</button>
    <div id="characterList" class="row mt-3"></div>
</div>

<script>
    document.getElementById('loadCharacters').addEventListener('click', function () {
        axios.get("{{ route('characters') }}")
            .then(response => {
                const characters = response.data.results;
                const characterList = document.getElementById('characterList');
                characterList.innerHTML = ''; // Limpa antes de inserir
                characters.forEach(character => {
                    characterList.innerHTML += `
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="${character.image}" class="card-img-top" alt="${character.name}">
                                <div class="card-body">
                                    <h5 class="card-title">${character.name}</h5>
                                    <p class="card-text">Espécie: ${character.species}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
            })
            .catch(error => console.error('Erro:', error));
    });
</script>
@endsection
