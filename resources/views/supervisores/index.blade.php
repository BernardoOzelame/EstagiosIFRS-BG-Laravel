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

@section('titulo', 'Supervisores')

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

    <h1>SUPERVISORES</h1>

    <a class="inserir" href="{{ route('supervisores/cadastrar') }}">inserir novo supervisor</a>

    <div class="pesquisar">
        <input type="text" id="pesquisa" placeholder="">
        <i class="fa-solid fa-magnifying-glass iconePesquisa"></i>
    </div>

    <div id="resultadoPesquisa">
        <table border="1" id="tabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cargo</th>
                    <th>Formação</th>
                    <th>Celular</th>
                    <th>Empresa</th>
                    <th class="thAcoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supervisores as $supervisor)
                    <tr>
                        <td>{{ $supervisor->nome }}</td>
                        <td>{{ $supervisor->email }}</td>
                        <td>{{ $supervisor->cargo }}</td>
                        <td>{{ $supervisor->formacao }}</td>
                        <td>{{ $supervisor->telefoneCelular }}</td>
                        <td>{{ $supervisor->empresa->nome }}</td>
                        <td>
                            <button 
                                type="button"
                                class="acoes editar"
                                title="Editar"
                                onclick="window.location.href='{{ route('supervisores/editar', $supervisor->id) }}'">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button 
                                type="button" 
                                class="acoes excluir"
                                title="Excluir"
                                onclick="abrirModal({{ $supervisor->id }}, 'Exclusao')">
                                <i class='fa-solid fa-trash-can'></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div id="nenhumResultado">nenhum resultado encontrado</div>

    </div>
    @foreach($supervisores as $supervisor)
        @include('supervisores/apagar', ['supervisor' => $supervisor])
    @endforeach

@endsection