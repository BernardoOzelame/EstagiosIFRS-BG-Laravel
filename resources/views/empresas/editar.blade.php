@php
    $arquivosCSS = [
        "css/forms.css",
        "css/toasts.css"
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Editar Empresa')

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

    <h1>FORMULÁRIO DA EMPRESA</h1>

    <a class="inserir"  href="{{ route('empresas') }}">voltar para a listagem</a>

    <form action="{{ route('empresas/editar', $empresa->id) }}" method="POST" id="formulario">
        @csrf
        @method('put')
        <label for="nome" title="Este campo é obrigatório!">Nome<span class="obrigatorio"> *</span></label>
        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('nome', $empresa->nome ?? '') }}">
        
        <label for="cnpj" title="Este campo é obrigatório!">CNPJ<span class="obrigatorio"> *</span></label>
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ old('cnpj', $empresa->cnpj ?? '') }}">
        
        <label for="numConvenio" title="Este campo é obrigatório!">Número do convênio<span class="obrigatorio"> *</span></label>
        <input type="text" name="numConvenio" id="numConvenio" placeholder="Número do convênio" value="{{ old('numConvenio', $empresa->numConvenio ?? '') }}">
        
        <label for="telefoneCelular" title="Este campo é obrigatório!">Celular<span class="obrigatorio"> *</span></label>
        <input type="text" name="telefoneCelular" id="telefoneCelular" placeholder="Celular" value="{{ old('telefoneCelular', $empresa->telefoneCelular ?? '') }}">
        
        <label for="email" title="Este campo é obrigatório!">E-mail<span class="obrigatorio"> *</span></label>
        <input type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email', $empresa->email ?? '') }}">

        <label for="areas_id" title="Este campo é obrigatório!">Áreas<span class="obrigatorio"> *</span></label>
        <select name="areas_id" id="areas_id">
            <option value="-1">Selecione a área</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}"
                    {{ old('areas_id', $empresa->areas_id ?? '') == $area->id ? 'selected' : '' }}>
                    {{ $area->nome }}
                </option>
            @endforeach
        </select>

        <label for="endereco" title="Este campo é obrigatório!">Endereço<span class="obrigatorio"> *</span></label>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ old('endereco', $empresa->endereco ?? '') }}">

        <label for="cidades_id" title="Este campo é obrigatório!">Cidade<span class="obrigatorio"> *</span></label>
        <select name="cidades_id" id="cidades_id">
            <option value="-1">Selecione a cidade</option>
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->id }}" 
                    {{ old('cidades_id', $empresa->cidades_id ?? '') == $cidade->id ? 'selected' : '' }}>
                    {{ $cidade->nome }}
                </option>
            @endforeach
        </select>
        
        <div class="alinha-botao">
            <button type="submit">Salvar</button>
        </div>

    </form>
@endsection