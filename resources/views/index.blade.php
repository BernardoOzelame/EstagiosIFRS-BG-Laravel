@php
    $arquivosCSS = [
        "css/index.css"
    ];
@endphp

@extends('base')

@section('titulo', 'Página Inicial')

@section('conteudo')
    <div class="sair">
        <a class="sairA" href="{{ route('logout') }}"><i class="fa-regular fa-circle-left sairI" style="color: #f0f0f0;"></i>Sair</a>
    </div>

    <div class="container">
        <div class="alinha-textos">
            <h1>SEÇÃO DE ESTÁGIOS</h1>
            
            <hr>

            <div class="texto">
                <p id='defTam'>Bem-vindo(a) ao portal de estágios do IFRS - <i>Campus</i> Bento Gonçalves, <b>{{ Auth::user()['nome'] }}</b>!</p>
                <p>Aqui, abrimos as portas para que as oportunidades se transformem em experiências incríveis. Cada desafio é uma chance de crescimento, tanto pessoal quanto profissional. Não estamos apenas conectando estudantes a estágios; estamos construindo trampolins para o sucesso e a realização. Vamos embarcar juntos nessa jornada de descobertas e conquistas!</p>
            </div>
        </div>

        <div class="img">
            <img src="{{ asset('imgs/cracha.png') }}">
        </div>
    </div>

    <div class="cards-container">
        <a class="card" href="../infosEstagio.php">
            INFORMAÇÕES GERAIS
        </a>

        <a class="card" href="{{ route('alunos') }}">
            ALUNOS
        </a>

        <a class="card" href="{{ route('professores') }}">
            PROFESSORES
        </a>

        <a class="card" href="../notasEstagio.php">
            NOTAS
        </a>

        <a class="card" href="{{ route('cursos') }}">
            CURSOS
        </a>

        <a class="card" href="{{ route('areas') }}">
            ÁREAS
        </a>

        <a class="card" href="{{ route('cidades') }}">
            CIDADES
        </a>

        <a class="card" href="{{ route('supervisores') }}">
            SUPERVISORES

        <a class="card" href="{{ route('representantes') }}">
            REPRESENTANTES
        </a>

        <a class="card" href="{{ route('empresas') }}">
            EMPRESAS
        </a>

        <a class="card" href="../documentos.php">
            DOCUMENTOS
        </a>

        <a class="card" href="{{ route('usuarios') }}">
            USUÁRIOS
        </a>
    </div>
@endsection