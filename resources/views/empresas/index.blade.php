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

@section('titulo', 'Empresas')

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

    <h1>EMPRESAS</h1>

    <a class="inserir" href="{{ route('empresas/cadastrar') }}">inserir nova empresa</a>

    <div class="pesquisar">
        <input type="text" id="pesquisa" placeholder="">
        <i class="fa-solid fa-magnifying-glass iconePesquisa"></i>
    </div>

    <div id="resultadoPesquisa">
        <table border="1" id="tabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Número do convênio</th>
                    <th class="thAcoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->nome }}</td>
                        <td>{{ $empresa->cnpj }}</td>
                        <td>{{ $empresa->numConvenio }}</td>
                        <td>
                            <button 
                                type="button"
                                class="acoes editar"
                                title="Editar"
                                onclick="window.location.href='{{ route('empresas/editar', $empresa->id) }}'">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button 
                                type="button" 
                                class="acoes excluir"
                                title="Excluir"
                                onclick="abrirModal({{ $empresa->id }}, 'Exclusao')">
                                <i class='fa-solid fa-trash-can'></i>
                            </button>
                            <button 
                                type="button" 
                                class="acoes visualizar"
                                title="Ver detalhes"
                                onclick="abrirModal({{ $empresa->id }}, 'Visualizacao')">
                                <i class='fa-solid fa-circle-info'></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div id="nenhumResultado">nenhum resultado encontrado</div>

    </div>
    @foreach($empresas as $empresa)
        @include('empresas/apagar', ['empresa' => $empresa])
        @include('empresas/visualizar', ['empresa' => $empresa])
    @endforeach

@endsection