@php
    $arquivosCSS = [
        "css/forms.css",
        "css/toasts.css"
    ];
    $arquivosJS = [
        "js/selects.js",
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Cadastrar Supervisor')

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

    <h1>FORMULÁRIO DO SUPERVISOR</h1>

    <a class="inserir"  href="{{ route('supervisores') }}">voltar para a listagem</a>

    <form action="{{ route('supervisores/gravar') }}" method="POST" id="formulario">
        @csrf
        <label for="nome" title="Este campo é obrigatório!">Nome<span class="obrigatorio"> *</span></label>
        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('nome') }}">
        
        <label for="email" title="Este campo é obrigatório!">E-mail<span class="obrigatorio"> *</span></label>
        <input type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}">

        <label for="cargo" title="Este campo é obrigatório!">Cargo<span class="obrigatorio"> *</span></label>
        <input type="text" name="cargo" id="cargo" placeholder="Cargo" value="{{ old('cargo') }}">
        
        <label for="formacao" title="Este campo é obrigatório!">Formação<span class="obrigatorio"> *</span></label>
        <input type="text" name="formacao" id="formacao" placeholder="Formação" value="{{ old('formacao') }}">

        <label for="telefoneCelular" title="Este campo é obrigatório!">Celular<span class="obrigatorio"> *</span></label>
        <input type="text" name="telefoneCelular" id="telefoneCelular" placeholder="Celular" value="{{ old('telefoneCelular') }}">
        
        <label for="empresas_id" title="Este campo é obrigatório!">Empresa<span class="obrigatorio"> *</span></label>
        <select name="empresas_id" id="empresas_id">
            <option value="-1">Selecione a empresa</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}"
                    {{ old('empresas_id') == $empresa->id ? 'selected' : '' }}>
                    {{ $empresa->nome }}
                </option>
            @endforeach
        </select>

        <div class="alinha-botao">
            <button type="submit">Salvar</button>
        </div>
    </form>
@endsection