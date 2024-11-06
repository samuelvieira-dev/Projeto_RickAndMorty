@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo à Home</h1>
    <p>Vai dar tudo certo! Acredite!</p>

    <div class="row" id="characters-container">
        <!-- Os cards dos personagens serão injetados aqui -->
    </div>
</div>

<script>
    // Função para carregar os personagens
    async function loadCharacters() {
        try {
            const response = await fetch('https://rickandmortyapi.com/api/character');
            const data = await response.json();
            const charactersContainer = document.getElementById('characters-container');

            // Limpa o container antes de adicionar os novos cards
            charactersContainer.innerHTML = '';

            data.results.forEach(character => {
                // Cria o card para cada personagem
                const card = `
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="${character.image}" class="card-img-top" alt="${character.name}">
                            <div class="card-body">
                                <h5 class="card-title">${character.name}</h5>
                                <p class="card-text">Status: ${character.status}</p>
                                <a href="{{ route('characters.show', '') }}/${character.id}" class="btn btn-primary">Detalhes</a>
                            </div>
                        </div>
                    </div>
                `;
                charactersContainer.innerHTML += card; // Adiciona o card ao container
            });
        } catch (error) {
            console.error('Erro ao carregar personagens:', error);
        }
    }

    // Chama a função para carregar os personagens quando a página for carregada
    window.onload = loadCharacters;
</script>
@endsection
