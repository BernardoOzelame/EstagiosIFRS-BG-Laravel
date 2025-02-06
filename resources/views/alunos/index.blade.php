@php
    $arquivosCSS = [
        "css/listas.css",
        "css/toasts.css"
    ];
    $arquivosJS = [
        "js/listas.js",
        "js/toasts.js"
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Alunos')

@section('conteudo')

    @if (session('sucesso'))
        <div class="mensagens mensagem-sucesso">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <h4 class="titulo-mensagens">Sucesso!</h4>
                <span title="Fechar" class="btn-fechar-mensagens btn-sucesso" onclick="this.parentElement.parentElement.style.display='none'">&times;</span>
            </div>
            <p>{!! session('sucesso') !!}</p>
        </div>
    @endif

    <h1>ALUNOS</h1>

    <a class="inserir" href="{{ route('alunos/cadastrar') }}">inserir novo aluno</a>

    <div class="pesquisar">
        <input type="text" id="pesquisa" placeholder="">
        <i class="fa-solid fa-magnifying-glass iconePesquisa"></i>
    </div>

    <div id="resultadoPesquisa">
        <table border="1" id="tabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Matrícula</th>
                    <th>Curso</th>
                    <th class="thAcoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->cpf }}</td>
                        <td>{{ $aluno->matricula }}</td>
                        <td>{{ $aluno->curso->nome }}</td>
                        <td>
                            <button 
                                type="button"
                                class="acoes editar"
                                title="Editar"
                                onclick="window.location.href='{{ route('alunos/editar', $aluno->id) }}'">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button 
                                type="button" 
                                class="acoes excluir"
                                title="Excluir"
                                onclick="abrirModal({{ $aluno->id }}, 'Exclusao')">
                                <i class='fa-solid fa-trash-can'></i>
                            </button>
                            <button 
                                type="button" 
                                class="acoes visualizar"
                                title="Ver detalhes"
                                onclick="abrirModal({{ $aluno->id }}, 'Visualizacao')">
                                <i class='fa-solid fa-circle-info'></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div id="nenhumResultado">nenhum resultado encontrado</div>

    </div>
    @foreach($alunos as $aluno)
        @include('alunos/apagar', ['aluno' => $aluno])
        @include('alunos/visualizar', ['aluno' => $aluno])
    @endforeach

@endsection