<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar"> 
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/rick.jpg') }}" alt="Logo" class="rounded-circle" width="40" height="40"> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link border rounded px-3 custom-bg" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border rounded px-3 mx-2 custom-bg" href="{{ route('characters') }}">Personagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border rounded px-3 custom-bg" href="{{ route('about') }}">Sobre</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <span class="nav-link text-white">Olá, {{ Auth::user()->name }}!</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Sair</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link border rounded px-3 mx-2 custom-bg" href="{{ route('login') }}">Login/Cadastro</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
