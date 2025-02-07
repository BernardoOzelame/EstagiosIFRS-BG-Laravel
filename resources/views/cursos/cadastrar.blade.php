@php
    $arquivosCSS = [
        "css/forms.css",
        "css/toasts.css"
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Cadastrar Curso')

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

    <h1>FORMULÁRIO DO CURSO</h1>

    <a class="inserir"  href="{{ route('cursos') }}">voltar para a listagem</a>

    <form action="{{ route('cursos/gravar') }}" method="POST" id="formulario">
        @csrf
        <label for="nome" title="Este campo é obrigatório!">Nome<span class="obrigatorio"> *</span></label>
        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('nome') }}">
        
        <div class="alinha-botao">
            <button type="submit">Salvar</button>
        </div>
    </form>
@endsection