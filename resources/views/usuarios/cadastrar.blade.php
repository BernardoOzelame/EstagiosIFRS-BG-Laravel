@php
    $arquivosCSS = [
        "css/forms.css",
        "css/toasts.css"
    ];
    $arquivosJS = [
        "js/iconSenhas.js",
        "js/selects.js"
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Cadastrar Usuário')

@section('conteudo')

    @if($errors->any())
        <div class="mensagens mensagem-erro">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <h4 class="titulo-mensagens">Atenção!</h4>
                <span title="Fechar" class="btn-fechar-mensagens btn-erro" onclick="this.parentElement.parentElement.style.display='none'">&times;</span>
            </div>
            @foreach($errors->all() as $erro)
                <p class="mensagem"><b>{{ $loop->iteration }}-</b> {{ $erro }}</p>
            @endforeach
        </div>
    @endif
    
    <h1>FORMULÁRIO DO USUÁRIO</h1>

    <a class="inserir"  href="{{ route('usuarios') }}">voltar para a listagem</a>

    <form action="{{ route('usuarios/gravar') }}" method="POST" id="formulario">
        @csrf
        <label for="nome" title="Este campo é obrigatório!">Nome<span class="obrigatorio"> *</span></label>
        <input type="text" name="nome" id="nome" placeholder="Nome do Usuário" value="{{ old('nome') }}">
        
        <label for="tipoUsuario" title="Este campo é obrigatório!">Tipo de usuário<span class="obrigatorio"> *</span></label>
        <select name="tipoUsuario" id="tipoUsuario">
            <option value="-1">Selecione o tipo de usuário</option>
            @foreach($tiposUsuario as $tipoUsuario)
                <option value="{{ $tipoUsuario }}"
                    {{ old('tipoUsuario') == $tipoUsuario ? 'selected' : '' }}>
                    {{ $tipoUsuario }}
                </option>
            @endforeach
        </select>

        <label for="login" title="Este campo é obrigatório!">Login<span class="obrigatorio"> *</span></label> 
        <input type="text" name="login" id="login" placeholder="Login do Usuário" value="{{ old('login') }}">
        
        <div class="input-container">
            <label for="password">Senha<span class="obrigatorio"> *</span></label> 
            <input class="inputs" placeholder="Senha do Usuário" type="password" name="password" id="password">
            <i class="toggle-icon far fa-eye" id="mostrarSenhaIcon"></i>
        </div>

        <div class="alinha-botao">
            <button type="submit">Salvar</button>
        </div>

    </form>
@endsection