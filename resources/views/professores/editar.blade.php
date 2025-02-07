@php
    $arquivosCSS = [
        "css/forms.css",
        "css/toasts.css"
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Editar Professor')

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

    <h1>FORMULÁRIO DO PROFESSOR</h1>

    <a class="inserir"  href="{{ route('professores') }}">voltar para a listagem</a>

    <form action="{{ route('professores/editar', $professor->id) }}" method="POST" id="formulario">
        @csrf
        @method('put')
        <label for="nome" title="Este campo é obrigatório!">Nome<span class="obrigatorio"> *</span></label>
        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('nome', $professor->nome ?? '') }}">
        
        <label for="siap" title="Este campo é obrigatório!">SIAP<span class="obrigatorio"> *</span></label>
        <input type="text" name="siap" id="siap" placeholder="SIAP" value="{{ old('siap', $professor->siap ?? '') }}">
        
        <label for="email" title="Este campo é obrigatório!">E-mail<span class="obrigatorio"> *</span></label>
        <input type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email', $professor->email ?? '') }}">

        <label for="areas_id" title="Este campo é obrigatório!">Áreas<span class="obrigatorio"> *</span></label>
        <select name="areas_id" id="areas_id">
            <option value="-1">Selecione a área</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}"
                    {{ old('areas_id', $professor->areas_id ?? '') == $area->id ? 'selected' : '' }}>
                    {{ $area->nome }}
                </option>
            @endforeach
        </select>
        
        <div class="alinha-botao">
            <button type="submit">Salvar</button>
        </div>

    </form>
@endsection