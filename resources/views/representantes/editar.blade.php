@php
    $arquivosCSS = [
        "css/forms.css",
        "css/toasts.css"
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Editar Representante')

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

    <h1>FORMULÁRIO DO REPRESENTANTE</h1>

    <a class="inserir"  href="{{ route('representantes') }}">voltar para a listagem</a>

    <form action="{{ route('representantes/editar', $representante->id) }}" method="POST" id="formulario">
        @csrf
        @method('put')
        <label for="nome" title="Este campo é obrigatório!">Nome<span class="obrigatorio"> *</span></label>
        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('nome', $representante->nome ?? '') }}">
        
        <label for="cpf" title="Este campo é obrigatório!">CPF<span class="obrigatorio"> *</span></label>
        <input type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ old('cpf', $representante->cpf ?? '') }}">
        
        <label for="funcao" title="Este campo é obrigatório!">Função<span class="obrigatorio"> *</span></label>
        <input type="text" name="funcao" id="funcao" placeholder="Função" value="{{ old('funcao', $representante->funcao ?? '') }}">

        <label for="empresas_id" title="Este campo é obrigatório!">Empresa<span class="obrigatorio"> *</span></label>
        <select name="empresas_id" id="empresas_id">
            <option value="-1">Selecione a empresa</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}"
                    {{ old('empresas_id', $representante->empresas_id ?? '') == $empresa->id ? 'selected' : '' }}>
                    {{ $empresa->nome }}
                </option>
            @endforeach
        </select>
        
        <div class="alinha-botao">
            <button type="submit">Salvar</button>
        </div>

    </form>
@endsection