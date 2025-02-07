@php
    $arquivosCSS = [
        "css/forms.css",
        "css/toasts.css"
    ];
    $arquivosJS = [
        "js/regraFormAluno.js"
    ];
@endphp

@extends('base')

@extends('menu')

@section('titulo', 'Editar Aluno')

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

    <h1>FORMULÁRIO DO ALUNO</h1>

    <a class="inserir"  href="{{ route('alunos') }}">voltar para a listagem</a>

    <form action="{{ route('alunos/editar', $aluno->id) }}" method="POST" id="formulario">
        @csrf
        @method('put')
        <label for="nome" title="Este campo é obrigatório!">Nome<span class="obrigatorio"> *</span></label>
        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('nome', $aluno->nome ?? '') }}">
        
        <label for="matricula" title="Este campo é obrigatório!">Matrícula<span class="obrigatorio"> *</span></label>
        <input type="text" name="matricula" id="matricula" placeholder="Matrícula" value="{{ old('matricula', $aluno->matricula ?? '') }}">

        <label for="curso_id" title="Este campo é obrigatório!">Curso<span class="obrigatorio"> *</span></label>
        <select name="curso_id" id="curso_id">
            <option value="-1">Selecione o curso</option>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}"
                    {{ old('curso_id', $aluno->curso_id ?? '') == $curso->id ? 'selected' : '' }}>
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>

        <label for="email" title="Este campo é obrigatório!">E-mail<span class="obrigatorio"> *</span></label>
        <input type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email', $aluno->email ?? '') }}">

        <label for="cpf" title="Este campo é obrigatório!">CPF<span class="obrigatorio"> *</span></label>
        <input type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ old('cpf', $aluno->cpf ?? '') }}">

        <label for="endereco" title="Este campo é obrigatório!">Endereço<span class="obrigatorio"> *</span></label>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ old('endereco', $aluno->endereco ?? '') }}">

        <label for="cidades_id" title="Este campo é obrigatório!">Cidade<span class="obrigatorio"> *</span></label>
        <select name="cidades_id" id="cidades_id">
            <option value="-1">Selecione a cidade</option>
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->id }}" 
                    {{ old('cidades_id', $aluno->cidades_id ?? '') == $cidade->id ? 'selected' : '' }}>
                    {{ $cidade->nome }}
                </option>
            @endforeach
        </select>

        <label for="telefoneCelular" title="Este campo é obrigatório!">Celular<span class="obrigatorio"> *</span></label>
        <input type="text" name="telefoneCelular" id="telefoneCelular" placeholder="Celular" value="{{ old('telefoneCelular', $aluno->telefoneCelular ?? '') }}">

        <label for="anoEstagio" title="Este campo é obrigatório!">Ano Estágio<span class="obrigatorio"> *</span></label>
        <input type="text" name="anoEstagio" id="anoEstagio" placeholder="Ano Estágio" value="{{ old('anoEstagio', $aluno->anoEstagio ?? '') }}">

        <div class="radio-group">
            <label title="Este campo é obrigatório!">Finalizou Curso?<span class="obrigatorio"> *</span></label>
            <div class="radio-options">
                <input type="radio" name="finalizouCurso" id="finalizouCursoSim" value="1" 
                    @checked(old('finalizouCurso', $aluno->finalizouCurso ?? '') == '1')>
                <label for="finalizouCursoSim">Sim</label>
        
                <input type="radio" name="finalizouCurso" id="finalizouCursoNao" value="0" 
                    @checked(old('finalizouCurso', $aluno->finalizouCurso ?? '') == '0')>
                <label for="finalizouCursoNao">Não</label>
            </div>
        </div>

        <div class="radio-group">
            <label title="Este campo é obrigatório!">Finalizou 2º ano?<span class="obrigatorio"> *</span></label>
            <div class="radio-options">
                <input type="radio" name="finalizou2Ano" id="finalizou2AnoSim" value="1" 
                    @checked(old('finalizou2Ano', $aluno->finalizou2Ano ?? '') == '1')>
                <label for="finalizou2AnoSim">Sim</label>
        
                <input type="radio" name="finalizou2Ano" id="finalizou2AnoNao" value="0" 
                    @checked(old('finalizou2Ano', $aluno->finalizou2Ano ?? '') == '0')>
                <label for="finalizou2AnoNao">Não</label>
            </div>
        </div>
        
        <div class="alinha-botao">
            <button type="submit">Salvar</button>
        </div>

    </form>
@endsection