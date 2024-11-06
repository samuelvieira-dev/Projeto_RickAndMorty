@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="display-4 mb-4 animated fadeInUp" style="animation-delay: 0.3s; color: #007bff; font-weight: bold;">Sobre Mim</h1>
            <p class="lead animated fadeInUp" style="animation-delay: 0.5s; font-size: 1.2rem; color: #555;">
                Olá! Sou um desenvolvedor apaixonado por programação, com experiência em desenvolvimento web utilizando as mais recentes tecnologias. Tenho habilidades em PHP, Laravel, JavaScript, e estou sempre buscando aprender mais para criar soluções inovadoras e eficazes.
            </p>
            <p class="animated fadeInUp" style="animation-delay: 0.7s; color: #555;">
                Atualmente, busco oportunidades para contribuir com minha experiência em projetos desafiadores, além de expandir meus conhecimentos na área de desenvolvimento fullstack. Meu objetivo é trabalhar com tecnologias que impactam positivamente a vida das pessoas, seja em projetos de código aberto ou empresas inovadoras.
            </p>

            <h2 class="mt-4 animated fadeInUp" style="animation-delay: 0.9s; color: #343a40;">Experiência e Projetos</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item animated fadeInUp" style="animation-delay: 1s; border: 2px solid #007bff; border-radius: 8px; background-color: #f8f9fa;">
                    <strong class="text-primary">Desenvolvedor Backend (PHP e Laravel)</strong> - Empresa XYZ
                    <p>Trabalhei em diversos projetos com PHP, criando APIs e integrando sistemas para melhorar a eficiência das operações.</p>
                </li>
                <li class="list-group-item animated fadeInUp" style="animation-delay: 1.2s; border: 2px solid #007bff; border-radius: 8px; background-color: #f8f9fa;">
                    <strong class="text-primary">Projeto Pessoal: Sistema de Gerenciamento de Tarefas</strong>
                    <p>Desenvolvi um sistema completo de gerenciamento de tarefas usando Laravel e Vue.js, com funcionalidades como CRUD, autenticação e notificações.</p>
                </li>
            </ul>

            <div class="mt-4">
                <h3 class="animated fadeInUp" style="animation-delay: 1.4s; color: #343a40;">Links dos Projetos</h3>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">
                        <a href="https://github.com/seuusuario/projeto1" target="_blank" class="btn btn-lg btn-primary animated fadeInUp" style="animation-delay: 1.6s; box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3); transition: all 0.3s ease;">
                            Projeto 1 no GitHub
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="https://github.com/samuelvieira-dev" target="_blank" class="btn btn-lg btn-dark animated fadeInUp" style="animation-delay: 1.8s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); transition: all 0.3s ease;">
                            Meu Portfólio
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-6 text-center">
            <img src="https://via.placeholder.com/400" alt="Foto do Desenvolvedor" class="img-fluid rounded-circle animated fadeInUp" style="animation-delay: 2s; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);">
        </div>
    </div>
</div>

<!-- Incluindo Bootstrap, animações e estilos personalizados -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
<script>
    // Efeito de hover nos botões
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'scale(1.1)';
        });
        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
        });
    });
</script>
@endsection

@endsection
