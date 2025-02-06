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

@section('titulo', 'Usuários')

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

    <h1>USUÁRIOS</h1>

    <a class="inserir" href="{{ route('usuarios/cadastrar') }}">inserir novo usuário</a>

    <div class="pesquisar">
        <input type="text" id="pesquisa" placeholder="">
        <i class="fa-solid fa-magnifying-glass iconePesquisa"></i>
    </div>

    <div id="resultadoPesquisa">
        <table border="1" id="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Tipo de Usuário</th>
                    <th class="thAcoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->login }}</td>
                        <td>{{ $usuario->tipoUsuario }}</td>
                        <td>
                            <button 
                                type="button"
                                class="acoes editar"
                                title="Editar"
                                onclick="window.location.href='{{ route('usuarios/editar', $usuario->id) }}'">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button 
                                type="button" 
                                class="acoes excluir"
                                title="Excluir"
                                onclick="abrirModal({{ $usuario->id }}, 'Exclusao')">
                                <i class='fa-solid fa-trash-can'></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div id="nenhumResultado">nenhum resultado encontrado</div>

    </div>
    @foreach($usuarios as $usuario)
        @include('usuarios/apagar', ['usuario' => $usuario])
    @endforeach

@endsection